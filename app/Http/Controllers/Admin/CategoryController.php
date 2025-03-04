<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        if (session('success_message')) {
            Alert::success('Sukses', session('success_message'));
        }

        if (session('update')) {
            Alert::success('Sukses', session('update'));
        }

        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->except('_token');
        $slug = Str::of($request->nama)->slug('-');
        $data['slug'] = $slug;
        Category::create($data);

        return redirect()->route('category.index')->withSuccessMessage('data berhasil ditambah');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->except('_token');
        $slug = Str::of($request->nama)->slug('-');
        $data['slug'] = $slug;

        if ($request->new) {
            $data['new'] = $request->new;
        } else {
            $data['new'] = 0;
        }

        if ($request->status) {
            $data['status'] = $request->status;
        } else {
            $data['status'] = 0;
        }

        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('category.index')->with('update', 'category berhasil di update');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('danger', 'category berhasil di hapus');
    }
}
