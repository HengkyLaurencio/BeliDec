<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts() {
        $productData = Product::all();
        return view('getProducts', ['productData' => $productData]);
    }

    public function productsUser(){
        $productData = Product::all();
        return view('userProducts', ['productData' => $productData]);
    }

    public function getProduct($id){
        $product = Product::find($id);
        if (!$product) {
            return response('Product not found');
        }
        return view('getProduct', ['product' => $product]);
    }

    public function newProduct (Request $request) {
        $productData = $request->validate([
            'productName' => ['required', 'string'],
            'Description' => ['required', 'string'],
            'Price' => ['required', 'decimal:2'],
            'Stock' => ['required', 'integer'],
            'shopID' => ['required', 'integer']
        ]);
    
        $newData = Product::create([
            'name' => $productData['productName'],
            'description' => $productData['Description'],
            'price' => $productData['Price'],
            'stock' => $productData['Stock'],
            'shop_id'=> $productData['shopID']
        ]);
    
        return redirect()->route('getProducts');
    }
    
    public function createProduct(Product $product, Request $request){
        return view('createProduct', ['product' => $product]);
    }

    public function updateProduct(Product $product, Request $request){
        $productData = $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | decimal:2',
            'stock' => 'required | integer'
        ]);

        $product->update($productData);
        return redirect(route('getProduct'))->with('success', 'Success, Item added into Cart!');
    }

    public function editProduct(Product $product, Request $request){
        return view('updateProduct', ['product' => $product]);
    }

    public function deleteProduct (Product $product) {
        
        $product->delete();
        return redirect()->route('getProducts');
    }

}