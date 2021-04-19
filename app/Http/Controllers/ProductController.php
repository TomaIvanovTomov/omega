<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class ProductController extends Controller
{
    public function index($locale, $id)
    {
        $product = Product::where("id", $id)->first();

        return view('pages.product', compact(
            'product',
            'title'
        ));
    }
}
