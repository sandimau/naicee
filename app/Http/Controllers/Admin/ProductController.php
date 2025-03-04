<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        if (session('success_message')) {
            Alert::success('Sukses', session('success_message'));
        }

        if (session('update')) {
            Alert::success('Sukses', session('update'));
        }

        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->except('_token');
        $slug = Str::of($request->nama)->slug('-');
        $data['slug'] = $slug;
        Product::create($data);
        return redirect()->route('product.index')->withSuccessMessage('data berhasil ditambah');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show',compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $slug = Str::of($request->nama)->slug('-');
        $data['slug'] = $slug;

        $request->trending ? $data['trending'] = $request->trending : $data['trending'] = 0;
        $request->status ? $data['status'] = $request->status : $data['status'] = 0;
        $product = Product::findOrFail($id);
        $product->update($data);
        return redirect()->route('product.index')->with('update', 'product berhasil di update');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('danger', 'product berhasil di hapus');
    }
}
