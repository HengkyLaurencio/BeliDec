<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ShopsController extends Controller
{
    public function registerShop()
    {
        return view("viewShop");
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
}
