<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request, Product $product)
    {
        if ($product->stock <= 0) {
            $cartCount = Cart::where('user_id', auth()->id())->sum('quantity');

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'This product is out of stock.',
                    'cart_count' => $cartCount,
                ], 422);
            }

            return redirect()->back()->with('error', 'This product is out of stock.');
        }

        $cartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        $currentQuantity = $cartItem ? $cartItem->quantity : 0;

        if ($currentQuantity >= $product->stock) {
            $cartCount = Cart::where('user_id', auth()->id())->sum('quantity');

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot add more than the available stock for ' . $product->name . '.',
                    'cart_count' => $cartCount,
                ], 422);
            }

            return redirect()->back()->with('error', 'You cannot add more than the available stock for ' . $product->name . '.');
        }

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        $cartCount = Cart::where('user_id', auth()->id())->sum('quantity');

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $product->name . ' added to cart.',
                'cart_count' => $cartCount,
            ]);
        }

        return redirect()->back()->with('success', $product->name . ' added to cart.');
    }

    public function remove($id)
    {
        $cart = Cart::where('user_id', Auth::id())
            ->findOrFail($id);

        $cart->delete();

        return redirect('/cart')->with('success', 'Product removed from cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($cart->product->stock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return back()->with('success', 'Cart updated.');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect('/cart')->with('success', 'Cart cleared successfully.');
    }

    public function checkoutForm()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $shippingPrice = 0;
        $total = $subtotal + $shippingPrice;

        return view('checkout', compact('cartItems', 'subtotal', 'shippingPrice', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:30',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
        ]);

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect('/cart')->with('error', 'Your cart is empty.');
        }

        // Check stock availability
        foreach ($cartItems as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect('/cart')->with('error', $item->product->name . ' does not have enough stock.');
            }
        }

        DB::transaction(function () use ($cartItems, $request) {
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });

            $shippingPrice = 0;
            $total = $subtotal + $shippingPrice;

            $user = auth()->user();

            $order = Order::create([
                'user_id' => $user->id,
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'subtotal' => $subtotal,
                'shipping_price' => $shippingPrice,
                'shipping_method' => 'Free Shipping',
                'payment_method' => $request->payment_method,
                'total_price' => $total,
                'status' => 'New',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->price * $item->quantity,
                ]);

                $item->product->decrement('stock', $item->quantity);
            }

            Cart::where('user_id', Auth::id())->delete();
        });

        return redirect('/cart')->with('success', 'Order placed successfully!');
    }
}
