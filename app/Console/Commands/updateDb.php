<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

/**
 * Класс для обновления дб
 */
class updateDb extends Command
{
    /**
     * Название артисан команды
     *
     * @var string
     */
    protected $signature = 'app:update-db';

    /**
     * Описание команды.
     *
     * @var string
     */
    protected $description = 'Update db every 5 minutes';

    /**
     * выполнение команды
     */
    public function handle()
    {
        $shops = DB::table('shops')->get();
        //запускаем цикл с магазинами
        foreach ($shops as $shop) {

            try {
                $context = stream_context_create(['http' => [
                    'header'=>'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36 \r\n'.
                        'Connection: close\r\n']
                ]);
                // Подключаемся к апи магазина
                $json = file_get_contents($shop->api,false,$context);
                $data = json_decode($json);
                // у каждой платформы, могут быть разные данные. Поэтому проверяем платформу
                switch ($shop->platform) {
                    case "Shopify":
                        foreach ($data -> products as $item) {
                            $match = ['shops_id' => $shop->id, 'sku' => !empty($item->variants[0]->sku) ? $item->variants[0]->sku : $item->title,'external_id' => intval($item->id)];
                            // сохроняем новые записи
                            $test = Product::firstOrCreate ($match, [
                                'external_id' => intval($item->id),
                                'name' => $item->title,
                                'sku' => !empty($item->variants[0]->sku) ? $item->variants[0]->sku : $item->title,
                                'image' => $item->images[0]->src,
                                'description' => $item->body_html,
                                'price' => floatval($item->variants[0]->price),
                                'shops_id' => $shop->id]);
                        }
                }
            } catch (\Exception $error) {
                Log::info($error->getMessage());
                throw new \Exception($error);
            }
        }
        Log::info('Task end');
    }
}
