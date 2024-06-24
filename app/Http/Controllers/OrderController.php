<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createShop(Request $request)
    {
        $orderData = $request->validate([
            'user_id' => ['required', 'integer'],
            'total' => ['required', 'float'],
            'status' => ['required', 'string'],
        ]);

        $order = Order::create([
            'name' => $orderData['shopName'],
            'owner_id'=> $orderData['ownerId'],
            'description' => $orderData['Description'],
        ]);

        if (!$order) {
            return redirect()->route('registerShop')->with('error', 'Registration Failed, try again.');
        }

        return redirect()->route('registerShop')->with('success', 'Shop created successfully.');
    }

}
