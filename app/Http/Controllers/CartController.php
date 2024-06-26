<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartItemsData = CartItem::where('cart_id', $request->cart_id)
            ->with('product')
            ->get();

        $carts = Cart::latest()->paginate(10);
        return view('cart', compact('carts'));
    }

    public function getCartItems()
    {
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
        return view('cart', compact('cartItemsData'));
    }
   
    public function putItem(Request $request)
    {
        $user_id = auth()->user()->id;
        $cart = Cart::firstOrCreate(
            ['user_id' => $user_id]
        );

        $product = Product::find($request->product_id);

        if ($product->stock < $request->quantity) {
            return redirect(route('getProducts'))->with('error', 'Stock less than items quantity!');
        }else{
            $cart->products()->create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);

            return redirect()->back()->with('success', 'Item successfully added!');
        }
    }

    public function deleteItem(Request $request)
    {

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
