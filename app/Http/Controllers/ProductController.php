<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use View;

class ProductController extends Controller
{
    /**
     * Выводим один продукт продукты.
     *
     * @return View
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return View::make('product', ['product' => $product]);
    }
}
