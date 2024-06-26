<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'ILIKE', "%{$query}%")->get();
        $shops = Shop::where('name', 'ILIKE', "%{$query}%")->get();

        return view('search', ['products' => $products, 'shops' => $shops, 'query' => $query]);
    }
}
