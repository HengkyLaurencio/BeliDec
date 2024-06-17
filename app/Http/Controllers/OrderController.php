<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $orderData = Order::all();
        foreach ($orderData as $order){
            echo $order . '<br>';
        }
    }

    public function getOrders($id){
        $orderData = Order::find($id);
        if (!$orderData) {
            return response('Data not found', 404);
        }
        return view();
    }
}
