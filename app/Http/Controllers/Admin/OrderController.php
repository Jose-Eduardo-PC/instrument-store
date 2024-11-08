<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0'
        ]);

        $order = new Order($request->all());
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Pedido creado correctamente.');
    }

    public function show($id)
    {
        $order = Order::with('product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();
        return view('admin.orders.edit', compact('order', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0'
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('admin.orders.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
