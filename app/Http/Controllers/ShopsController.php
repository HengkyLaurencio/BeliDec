<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ShopsController extends Controller
{
    public function registerShop()
    {
        return view("registerShop");
    }

    public function getShop()
    {
        $shopData = Shop::all();     
        return view('shop', compact('shopData'));
    }


    public function createShop(Request $request)
    {
        $shopData = $request->validate([
            'shopName' => ['required', 'string'],
            'ownerId' => ['required', 'integer'],
            'Description' => ['required', 'string'],
        ]);

        $shop = Shop::create([
            'name' => $shopData['shopName'],
            'owner_id'=> $shopData['ownerId'],
            'description' => $shopData['Description'],
        ]);

        if (!$shop) {
            return redirect()->route('registerShop')->with('error', 'Registration Failed, try again.');
        }

        return redirect()->route('registerShop')->with('success', 'Shop created successfully.');
    }

    public function getShops($id){
        $shop = Shop::find($id);
        if (!$shop) {
            return response('shop not found', 404);
        }

        return view('getShops',compact('shop'));
    }

    public function editShop($id)
    {
        $shop = Shop::find($id);
        if (!$shop) {
            return response('shop not found', 404);
        }
        return view('editShop',compact('shop'));
    }

    public function updateShop($id, Request $request)
    {
            $shop = shop::find($id);
            $shopData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
            ]);
    
            $shop->update($shopData);
    
            return redirect()->route('getshop')->with('success', 'Shop updated successfully.');
    }

    public function deleteShop($id)
    {
        $shop = shop::find($id);

        return view('deleteView', compact('shop'));
    }

    public function removeShop($id) {
        $shop = shop::find($id);
        $shop->delete();

        return redirect()->route('getShop');
    }
}
