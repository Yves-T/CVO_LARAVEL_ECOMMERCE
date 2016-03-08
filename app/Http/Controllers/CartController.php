<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;


class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        return view('store.cart')->with('products', Cart::content());
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->get('id'));
        $quantity = $request->get('quantity');

        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => $quantity,
            'price' => $product->price,
            'options' => [
                'image' => $product->image
            ],
        ]);

        return redirect(route('store.cart'));
    }

    public function updateCart(Request $request)
    {
        Cart::update($request->get('rowid'), $request->get('quantity'));
        return redirect(route('store.cart'));
    }

    public function removeFromCart(Request $request)
    {
        Cart::remove($request->get('rowid'));
        return redirect(route('store.cart'));
    }
}
