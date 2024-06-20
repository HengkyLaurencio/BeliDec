<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function getCart(){
        $cartData = Cart::all();
        foreach ($cartData as $cart){
            echo $cart . '<br>';
        }
    }

    public function getCartItems($cart_id){
        $cartItemsData = CartItem::all();
        $exists = CartItem::where('cart_id', $cart_id)->exists();

        //cek availability
        if (!$exists) {
            return redirect(route('getProduct'))->with('error', 'CartItems doesnt exist!');
        }

        foreach ($cartItemsData as $cartItems){
            if ($cartItems->cart_id == $cart_id){
                echo $cartItems.'<br>';
            }
        }
    }
    
    public function putItem(Request $request)
    {
        $cart = Cart::find($request->cart_id);
        $product = Product::find($request->product_id);

        if (!$cart){
            $cart = Cart::create();
        }

        if ($product->stock < $request->quantity){
            return redirect(route('getProduct'))->with('error', 'Stock less than items quantity!');
        }

        $cart->products()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        $request->validate([
            'cart_id' => ['required', 'string'],
            'product_id' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
        ]);
        
        return redirect(route('getProduct'))->with('success', 'Success, Item added into Cart!');

    }   

    public function deleteItem (Request $request){

    $cartItem = CartItem::where('cart_id', $request->cart_id)
                ->where('product_id', $request->product_id);
    
    if ($cartItem){
        $cartItem->delete();
        return redirect(route('getCartItems($request->cart_id)'))->with('success', 'Success, Item deleted!');
    }
    
    
    }
    



}