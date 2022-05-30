<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::orderBy('id', 'desc')->paginate(5);
        return view('product.index', $data);
    }
    public function product_list()
    {
        $data['products'] = Product::orderBy('id', 'desc')->paginate(5);
        return view('product.product_list', $data);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'product has been created successfully.');
    }
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product Has Been updated successfully');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'product has been deleted successfully');
    }
}
