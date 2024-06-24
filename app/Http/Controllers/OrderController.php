<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
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
        $orderData = OrderItem::find($id);
        if (!$orderData) {
            return response('Data not found', 404);
        }
        return view();
    }

    public function createOrder(Request $request) {
        $order = Order::find($request->order_id);
        $product = Product::find($request->product_id);

        if (!$order){
            $order = Order::create();
        }

        if ($product->stock < $request->quantity){
            return redirect(route('getProduct'))->with('error', 'Stock less than items quantity!');
        }

        $order->items()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        $request->validate([
            'product_id' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'integer'],
        ]);
        
        return redirect();
    }

    public function editOrder($id) {
        $order = OrderItem::find($id);
        if (!$order) {
            return response('Order not found', 404);
        }
        return view();
    }

    public function updateOrder($id, Request $request) {
        $orderItem = OrderItem::find($id);
        $orderData = $request->validate([
            'product_id' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'integer'],
        ]);

        $orderItem->update($orderData);

        return redirect();
    }

    public function deleteOrder (Request $request){
        $orderData = OrderItem::where('order_id', $request->order_id)
                    ->where('product_id', $request->product_id)
                    ->first();
        
        if ($orderData){
            $orderData->delete();
            return redirect();
        }
    }
}
