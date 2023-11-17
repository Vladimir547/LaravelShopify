<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use App\Models\Product;
class ProductsController extends Controller
{
    /**
     * Выводим все продукты.
     *
     * @return View
     */
    public function show()
    {
        $products = DB::table('products')->paginate(9);
        return View::make('products', ['products' => $products]);
    }
}
