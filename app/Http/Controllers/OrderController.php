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
}
