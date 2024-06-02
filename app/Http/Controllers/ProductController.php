<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct() {
        $productData = Product::all();
        return view();

    }
}