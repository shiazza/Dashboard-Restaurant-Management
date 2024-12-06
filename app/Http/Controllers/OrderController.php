<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::with('items.menu')->get();
        return view('order.index', compact('order'));
    }

    public function create()
    {
        $menus = Menu::all(); 
        return view('order.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'order_date' => 'required',
            'menu_items' => 'required|array',
            'menu_items.*.menu_id' => 'required|exists:menus,id',
            'menu_items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = 0;
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'order_date' => $request->order_date,
            'total_price' => 0, // Temporary, will be updated
        ]);

        foreach ($request->menu_items as $item) {
            $menu = Menu::find($item['menu_id']);
            $subtotal = $menu->price * $item['quantity'];
            $totalPrice += $subtotal;

            $order->items()->create([
                'menu_id' => $menu->id,
                'quantity' => $item['quantity'],
                'price' => $menu->price,
                'subtotal' => $subtotal,
            ]);
        }

        $order->update(['total_price' => $totalPrice]);

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load('items.menu');
        return view('order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }
}