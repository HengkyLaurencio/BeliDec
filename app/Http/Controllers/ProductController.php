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

    public function getProduct($id){
        $product = Product::find($id);
        if (!$product) {
            return response('Product not found');
        }
        return view('getProduct', ['product' => $product]);
    }

    public function simpan(Request $request) {
        $productData = $request->validate([
            'productName' => ['required', 'string'],
            'Description' => ['required', 'string'],
            'Price' => ['required', 'decimal:2'],
            'Stock' => ['required', 'integer'],
            'ShopId' => ['required', 'integer'],
        ]);
    
        $newProduct = Product::create([
            'name' => $productData['productName'],
            'description' => $productData['Description'],
            'price' => $productData['Price'],
            'stock' => $productData['Stock'],
            'shop_id' => $productData['ShopId'],
        ]);
    
        return redirect()->route('getProducts');
    }
    
    public function createProduct(Product $product, Request $request){
        return '
        <html>
            <head><title>Tes</title>
            <body>
            <h1>Create Product</h1>
                <form method="post" action="'.route('simpan').'">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">

                    <div>
                    <label>Product Name</label>
                    <input type="text" name="productName" placeholder="Product Name">
                    </div>

                    <div>
                    <label>Description</label>
                    <input type="text" name="Description" placeholder="Description">
                    </div>

                    <div>
                    <label>Price</label>
                    <input type="text" name="Price" placeholder="Price">
                    </div>

                    <div>
                    <label>Stock</label>
                    <input type="text" name="Stock" placeholder="Stock">
                    </div>

                    <div>
                    <label>ShopId</label>
                    <input type="text" name="ShopId" placeholder="ShopId">
                    </div>

                    <div>
                    <input type="submit" value="Create Product">
                    </div>

                </form>
            </body>
        </html>
        ';
    }

    public function updateProduct(Product $product, Request $request){
        $productData = $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | decimal:2',
            'stock' => 'required | integer',
            'shop_id' => 'required | integer',
        ]);

        $product->update($productData);
        return redirect(route('getProduct'))->with('success', 'Success, Item added into Cart!');


    }

    public function editProduct(Product $product, Request $request){
        return view('updateProduct', ['product' => $product]);
    }

    public function deleteProduct (Product $product) {
        
        $product->delete();

        return redirect()->route('getProduct');
    }

}