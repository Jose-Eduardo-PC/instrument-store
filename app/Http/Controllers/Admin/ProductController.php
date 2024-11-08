<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function datatables()
    {
        return DataTables::eloquent(Product::query()
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select(['products.*', 'categories.name as category_name'])
        )
        ->addColumn('btn', 'admin.products.partials.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }
    
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $product = new Product($request->all());
        if ($request->hasFile('image')) {
            $product->addMedia($request->file('image'))->toMediaCollection('product_images');
        }
        $product->save();

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }
    

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        if ($request->hasFile('image')) {
            $product->addMedia($request->file('image'))->toMediaCollection('product_images');
        }

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
