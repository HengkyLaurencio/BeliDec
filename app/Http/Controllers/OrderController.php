<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrder() {
        $orderData = Order::paginate(10);
        return view('order.getOrder', ['orderData' => $orderData]);
    }

    public function getOrders($id) {
        $order = OrderItem::find($id);
        if (!$order) {
            return response('Order not found', 404);
        }
        return view('order.getOrders', ['order' => $order]);
    }

    public function createOrder(Request $request) {
        $userID = $request->session()->get('user_id');
        $carts = Cart::where('user_id', $userID)->get();

        if ($carts->isEmpty()) {
            return redirect()->route('getCart')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        $orderItems = [];

        foreach ($carts as $cart) {
            $cartItems = CartItem::where('cart_id', $cart->id)->get();
            if ($cartItems->isEmpty()) {
                continue;
            }
            foreach ($cartItems as $cartItem) {
                $total += $cartItem->quantity * $cartItem->product->price;
                $orderItems[] = [
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ];
            }
        }
        $order = Order::create([
            'user_id' => $userID,
            'total' => $total,
            'status' => 'Awaiting Payment',
        ]);

        foreach ($orderItems as $orderItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $orderItem['product_id'],
                'quantity' => $orderItem['quantity'],
                'price' => $orderItem['price'],
            ]);
        }
        CartItem::whereIn('cart_id', $carts->pluck('id'))->delete();
        return redirect()->route('getOrder')->with('success', 'Order berhasil dibuat.');
    }

    public function editOrder(Order $order) {
        return view('order.editOrder', ['order' => $order]);
    }

    public function updateOrder(Order $order, Request $request) {
        $validatedData = $request->validate([
            'status' => 'required|string',
        ]);

        $order->update($validatedData);

        return redirect()->route('getOrder');
    }

    public function deleteOrder(Order $order) {
        $order->delete();
        return redirect(route('getOrder'));
    }

    public function viewOrder(Request $request) {
        $userId = $request->session()->get('user_id');

        $orderData = Order::where(['user_id' => $userId])->paginate(10);
        return view('order.getOrder', ['orderData' => $orderData]);
    }
}
