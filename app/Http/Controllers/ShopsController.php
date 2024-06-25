<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ShopsController extends Controller
{

    public function getShop()
    {
        $shopData = Shop::all();     
        return view('shop', ['shopData' => $shopData]); 
    }


    public function registerShop()
    {
        return view("createShop");
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

        return redirect()->route('getShop')->with('success', 'Shop created successfully.');
    }

    public function getShops($id)
    {
        $shopData = Shop::find($id);
        if (!$shopData) {
            return response('shop not found', 404);
        }
        return view('shopid', ['shopData' => $shopData]);
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

        return view('getHistory', ['orderData' => $filteredOrderData]);
    }

    public function editShop($id)
    {
        $shopData = Shop::find($id);
        if (!$shopData) {
            return response('shop not found', 404);
        }
        
        return view('updateShops', ['shopData' => $shopData]);
    }

    public function updateShop($id, Request $request)
    {
        $shop = Shop::find($id);
        $shopData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
    
        $shop->update($shopData);
    
        return redirect()->route('getShop')->with('success', 'Shop updated successfully.');
    }

    public function deleteShop($id)
    {
        $shop = shop::find($id);

        return view('deleteShop', ['shop' => $shop]);
    }

    public function removeShop($id) {
        $shop = shop::find($id);
        $shop->delete();

        return redirect()->route('getShop')->with('success', 'Shop successfully deleted.');
    }
}
