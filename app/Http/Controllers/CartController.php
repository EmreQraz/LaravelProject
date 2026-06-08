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
            return redirect()->back()->with('success', 'This product is out of stock.');
        }
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'icon' => $product->icon,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
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

    public function checkout()
    {
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

        DB::transaction(function () use ($cart) {
            $total = 0;

            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            $user = auth()->user();

            $order = Order::create([
                'user_id' => $user ? $user->id : null,
                'customer_name' => $user ? $user->name : 'Guest Customer',
                'customer_email' => $user ? $user->email : 'guest@example.com',
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

            session()->flash('success', 'Order #' . $order->id . ' completed successfully. Thank you for shopping with QrazCart!');
        });

        return redirect('/cart');
    }
}
