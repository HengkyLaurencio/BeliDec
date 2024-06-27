<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ShopsController extends Controller
{

    public function getShop()
    {
        $shopData = Shop::paginate(10);     
        return view('shop.shop', ['shopData' => $shopData]); 
    }

    public function getShops($id)
    {
        $shopData = Shop::find($id);
        if (!$shopData) {
            return redirect()->back()->with('error', 'Shop not founds');
        }

        $productData = Product::where('shop_id', $shopData->id)->get();
        return view('shop.shopid', ['shopData' => $shopData, 'productData' => $productData]);
    }

    public function registerShop()
    {
        return view("shop.createShop");
    }

    public function createShop(Request $request)
    {
        $userId = $request->session()->get('user_id');
        
        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $shopData['name'] = $request->name;
        $shopData['owner_id'] = $userId;
        $shopData['description'] = $request->description;   

        $shop = Shop::create($shopData);

        if (!$shop) {
            return redirect()->route('registerShop')->with('error', 'Registration Failed, try again.');
        }

        return redirect()->route('shopMainDashboard')->with('success', 'Shop created successfully.');
    }

    public function editShop(Shop $shop)
    {
        return view('shop.updateShops', ['shop' => $shop]);
    }

    public function updateShop(Shop $shop, Request $request)
    {
        $shopData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $shop->update($shopData);
        
        return redirect()->back()->with('success', 'Shop updated successfully.');
    }

    public function deleteShop(Shop $shop) {
        $shop->delete();
        return redirect()->route('getShop')->with('success', 'Shop successfully deleted.');
    }

    public function getHistory(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $shopId = Shop::where('owner_id', $userId)->value('id');

        $orderDatas = OrderItem::all();
        $filteredOrderData = [];

        foreach($orderDatas as $orderData) {
            if($orderData->product->shop_id == $shopId) {
                $filteredOrderData[] = $orderData;
            }
        }

        return view('shop.getHistory', ['orderData' => $filteredOrderData]);
    }

    public function getHistoryAdmin(Shop $shop)
    {
        // $owner = Shop::find($shop);
        // $orderDatas = OrderItem::all();

        // foreach($orderDatas as $orderData) {
        //     if($orderData->product->shop_id) {
        //         $owner = [$orderData];
        //     }
        // }

        $orderDatas = OrderItem::all();
        $filteredOrderData = [];
        
        foreach($orderDatas as $orderData) {
            if($orderData->product->shop_id == $shop->id) {
                $filteredOrderData[] = $orderData;
            }
        }

        return view('shop.getHistoryAdmin', ['orderData' => $filteredOrderData]);
    }

    public function mainDashboard(Request $request) {
        $userId = $request->session()->get('user_id');
        $shopId = Shop::where('owner_id', $userId)->value('id');
        $shop = Shop::find($shopId);
        // dd($shop);
        return view('shop.mainDashboard', ['shop' => $shop]);
    }

    public function getProducts(Request $request) {
        $userId = $request->session()->get('user_id');
        $shopId = Shop::where('owner_id', $userId)->value('id');

        $products = Product::where('shop_id', $shopId)->paginate(10);
        // dd($products);  
        return view('shop.productDashboard', ['productData' => $products]);
    }

    public function updateProductShop(Product $product) {
        return view('shop.editProduct', ['product' => $product]);
    }

    public function adminEditShop(Request $request, Shop $shop) {
        
        // $shopId = $request->shopid
        // $shop = Shop::find($shopId);
        // // dd($shop);
        return view('shop.adminEditShop', ['shop' => $shop]);
    }
}
