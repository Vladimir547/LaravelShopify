<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            'shop' => 'Bruvi',
            'api' => 'https://bruvi.com/products.json',
            'platform' => 'Shopify'
        ]);
        DB::table('shops')->insert([
            'shop' => 'Goodeeworld',
            'api' => 'https://goodeeworld.com/products.json',
            'platform' => 'Shopify'
        ]);

    }
}
