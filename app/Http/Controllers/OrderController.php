<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder(){
        $orderData = Order::all();
        return view ('order.getOrder',['orderData'=>$orderData]);
    }

    public function getOrders($id) {
        $order = OrderItem::find($id);
        if (!$order) {
            return response('Order not found', 404);
        }
        return view ('order.getOrders',['order'=>$order]);
    }

    public function editOrder(Order $order){
        return view('order.editOrder',['order'=>$order]);
    }

    public function updateOrder(Order $order, Request $request){
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);
        
        $order->update($validatedData);
    
        return redirect()->route('getOrder');
    }

    public function deleteOrder (Order $order) {
        $order->delete();
        return redirect(route('getOrder'));
    }
}
