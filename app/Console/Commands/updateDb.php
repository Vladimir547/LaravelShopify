<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class updateDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update db every 5 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $shops = DB::table('shops')->get();
        foreach ($shops as $shop) {

            try {
                $context = stream_context_create(['http' => [
                    'header'=>'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36 \r\n'.
                        'Connection: close\r\n']
                ]);
                $json = file_get_contents($shop->api,false,$context);
                $data = json_decode($json);
                switch ($shop->platform) {
                    case "Shopify":
                        foreach ($data -> products as $item) {
                            $match = ['shop_id' => $shop->id, 'sku' => !empty($item->variants[0]->sku) ? $item->variants[0]->sku : $item->title,'external_id' => intval($item->id)];
                            $test = Product::firstOrCreate ($match, [
                                'external_id' => intval($item->id),
                                'name' => $item->title,
                                'sku' => !empty($item->variants[0]->sku) ? $item->variants[0]->sku : $item->title,
                                'image' => $item->images[0]->src,
                                'description' => $item->body_html,
                                'price' => floatval($item->variants[0]->price),
                                'shop_id' => $shop->id]);
                        }
                }
            } catch (\Exception $error) {
                throw new \Exception($error);
            }
        }
    }
}
