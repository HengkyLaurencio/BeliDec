<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Shop;
use App\Models\OrderItem;
use App\Models\Review;

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

    public function getProduct($id){
        $product = Product::find($id);
        $orderitem = OrderItem::find($id);

        if (!$product) {
            return response('Product not found');
        }
        
        return view('product.detailProduct', ['product' => $product, 'orderitem' => $orderitem]);
    }

    public function newProduct (Request $request) {
        $productData = $request->validate([
            'productName' => ['required', 'string'],
            'Description' => ['required', 'string'],
            'Price' => ['required', 'decimal:0'],
            'Stock' => ['required', 'integer'],
        ]);
        
        $userId = $request->session()->get('user_id');
        $shopID = Shop::where('owner_id', $userId)->value('id');

        $newData = Product::create([
            'name' => $productData['productName'],
            'description' => $productData['Description'],
            'price' => $productData['Price'],
            'stock' => $productData['Stock'],
            'shop_id'=> $shopID
        ]);
    
        return redirect()->back()->with('success', 'Product Add Successfully');
    }
    
    public function createProduct(Product $product, Request $request){
        return view('product.createProduct', ['product' => $product]);
    }

    public function updateProduct(Product $product, Request $request){
        $productData = $request->validate([
            'name' => 'required | string',
            'description' => 'required | string',
            'price' => 'required | decimal:0',
            'stock' => 'required | integer'
        ]);
        $product->update($productData);
        return redirect()->back()->with('success', 'Item Updated Successfully');
    }

    public function adminEditProduct(Product $product, Request $request){
        return view('product.editProductAdmin', ['product' => $product]);
    }

    public function editProduct(Product $product, Request $request){
        return view('product.updateProduct', ['product' => $product]);
    }

    public function deleteProduct (Product $product) {
        
        $product->delete();
        return redirect()->back()->with('success', 'Delete successfully');
    }

}
