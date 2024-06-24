<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $orderData = Order::all();
        return view ('order.getOrder',['orderData'=>$orderData]);
    }
}
