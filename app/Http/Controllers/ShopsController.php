<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function registerShop()
    {
        return view("registerShop");
    }

    public function createShop(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'owner_id' => 'required|string',
            'description' => 'required|string',
        ]);

        $data = new Shop();
        $data['name'] = $request->name;
        $data['owner_id'] = $request->owner_id;
        $data['description'] = $request->description;
        $shop = Shop::create($data);

        if (!$shop) {
            return redirect(route('registerShop'))->with('error', 'Registration Failed, try again.');
        }

        return redirect()->route('createShop')->with('success', 'Shop created successfully.');
    }
}
