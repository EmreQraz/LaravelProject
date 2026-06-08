<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function add(Product $product)
    {
        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock.');
        }

        $cart = session()->get('cart', []);

        $currentQuantity = 0;

        if (isset($cart[$product->id])) {
            $currentQuantity = $cart[$product->id]['quantity'];
        }

        if ($currentQuantity >= $product->stock) {
            return redirect()->back()->with('error', 'You cannot add more than the available stock for ' . $product->name . '.');
        }

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['image'] = $product->image;
            $cart[$product->id]['icon'] = $product->icon;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
                'icon' => $product->icon,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $product->name . ' added to cart.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect('/cart')->with('success', 'Product removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect('/cart')->with('success', 'Cart cleared successfully.');
    }

    public function checkoutForm()
    {
        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect('/cart')->with('success', 'Your cart is empty.');
        }

        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $shippingPrice = 0;
        $total = $subtotal + $shippingPrice;

        return view('checkout', compact('cart', 'subtotal', 'shippingPrice', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:30',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
        ]);

        $cart = session()->get('cart', []);

        if (count($cart) === 0) {
            return redirect('/cart')->with('success', 'Your cart is empty.');
        }

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                return redirect('/cart')->with('success', 'One of the products in your cart is no longer available.');
            }

            if ($product->stock < $item['quantity']) {
                return redirect('/cart')->with('success', $product->name . ' does not have enough stock.');
            }
        }

        DB::transaction(function () use ($cart, $request) {
            $subtotal = 0;

            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }

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

            foreach ($cart as $item) {
                $product = Product::find($item['id']);

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);

                $product->decrement('stock', $item['quantity']);
            }

            session()->forget('cart');

            session()->flash('success', 'Order #' . $order->id . ' completed successfully. Free shipping has been applied!');
        });

        return redirect('/cart');
    }
}
