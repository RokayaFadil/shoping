<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::all();
        
        return view('cart.indexcart', ['cartItems' => $cartItems]);
    }

    public function addToCart(Request $request, $productId)
    {
        
        $product = Product::findOrFail($productId);

        // Check if the product is already in the cart
        $cartItem = Cart::where('product_id', $productId)->first();

        if ($cartItem) {
            // If the product is already in the cart, update the quantity
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item
            Cart::create([
                'product_id' => $productId,
                'quantity' => $request->input('quantity', 1),
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy($cartItemId)
    {
        $cartItems = Cart::find($cartItemId);
        $cartItems ->delete();

        return to_route(route:'cart.index');
    }

    

}
