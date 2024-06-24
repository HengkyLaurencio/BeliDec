<?php

namespace App\Http\Controllers;

use App\Models\Shop;
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
        $shopData = $request->validate([
            'name' => ['required', 'string'],
            'owner_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ]);

        $shop = Shop::create($shopData);

        if (!$shop) {
            return redirect()->route('registerShop')->with('error', 'Registration Failed, try again.');
        }

        return redirect()->route('getShop')->with('success', 'Shop created successfully.');
    }

    public function getShops($id){
        $shopData = Shop::find($id);
        if (!$shopData) {
            return response('shop not found', 404);
        }
        return view('shop', ['shopData' => $shopData]);
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
