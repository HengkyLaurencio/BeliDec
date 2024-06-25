<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request){    
        $cartItemsData = CartItem::where('cart_id', $request->cart_id)
        ->with('product')
        ->get();

        $carts = Cart::latest()->paginate(10);
        return view('cart', compact ('carts'));
    }

    // public function getCart(){
    //     $cartData = Cart::all();
    //     foreach ($cartData as $cart){
    //         echo $cart . '<br>';
    //     }
    // }

    public function getCartItems(){
        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        $cart_id = $cart->id;

        
        if (!$cart_id) {
            return redirect(route('getProducts'))->with('error', 'CartItems doesnt exist!');
        }

        $cartItemsData = CartItem::where('cart_id', $cart_id)
        ->with('product')
        ->get();
        $exists = CartItem::where('cart_id', $cart_id)->exists();

        //cek availability
        if (!$exists) {
            return redirect(route('getProducts'))->with('error', 'CartItems doesnt exist!');
        }

        // foreach ($cartItemsData as $cartItems){
        //     echo $cartItems . '<br>';
        // }
        
        return view('cart', compact ('cartItemsData'));

        }
    public function getCartItemsHeader($cart_id){
        $cartItemsData = CartItem::where('cart_id', $cart_id)
        ->with('product')
        ->get();
        $exists = CartItem::where('cart_id', $cart_id)->exists();

        //cek availability
        if (!$exists) {
            return redirect(route('getProduct'))->with('error', 'CartItems doesnt exist!');
        }

        // foreach ($cartItemsData as $cartItems){
        //     echo $cartItems . '<br>';
        // }
        
         return view('home', compact ('cartItemsData'));

    }
    
    public function putItem(Request $request)
    {
        $user_id = auth()->user()->id;
        $cart = Cart::firstOrCreate(
            ['user_id' => $user_id]
        );
        $product = Product::find($request->product_id);
        //$createCart = Cart::create(['user_id' => $user_id,]);
        
        // if(!$createCart){
        //     return redirect(route('getProduct'))->with('error', 'CartItems doesnt exist!');
        // }

        // if (!$cart){
        //     $cart = Cart::create([
        //         'user_id' => $user_id,
        //     ]);
        // }

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
                ->where('product_id', $request->product_id)
                ->first();

    if ($cartItem) {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Success, Item deleted!'); // Menggunakan redirect()->back() untuk kembali ke halaman sebelumnya
    } else {
        return redirect()->back()->with('error', 'Failed to delete item.'); // Memberikan pesan error jika item tidak ditemukan
    }
    
    
    }
    



}