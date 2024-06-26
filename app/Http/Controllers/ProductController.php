<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts() {
        $productData = Product::paginate(10);
        return view('product.getProductsAdmin', ['productData' => $productData]);
    }

    public function productsUser(){
        $productData = Product::paginate(12);
        return view('product.userProducts', ['productData' => $productData]);
    }

    public function detailProduct(){
        return view('product.detailProduct');
    }

    public function getProduct($id){
        $product = Product::find($id);
        if (!$product) {
            return response('Product not found');
        }
        return view('product.getProduct', ['product' => $product]);
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
    
        return redirect()->route('product.getProducts');
    }
    
    public function createProduct(Product $product, Request $request){
        return view('product.createProduct', ['product' => $product]);
    }

    public function updateProduct(Product $product, Request $request){
        $productData = $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | decimal:2',
            'stock' => 'required | integer'
        ]);

        $product->update($productData);
        return redirect(route('product.getProduct'))->with('success', 'Success, Item added into Cart!');
    }

    public function editProduct(Product $product, Request $request){
        return view('product.updateProduct', ['product' => $product]);
    }

    public function deleteProduct (Product $product) {
        
        $product->delete();
        return redirect()->route('product.getProducts');
    }

}