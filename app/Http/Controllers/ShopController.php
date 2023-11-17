<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use View;

class ShopController extends Controller
{
    public function show($id)
    {
        /**
         * Выводим продукты одного магазина.
         *
         * @return View
         */
        $products = Product::where('shops_id', $id)->paginate(9);

        return View::make('products', ['products' => $products]);
    }
}
