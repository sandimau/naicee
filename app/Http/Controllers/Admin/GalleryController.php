<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $galleries = Gallery::with(['product'])->get();

        if (session('success_message')) {
            Alert::success('Sukses', session('success_message'));
        }

        if (session('delete')) {
            Alert::warning('Sukses', session('delete'));
        }
        return view('admin.gallery.index',compact('galleries'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.gallery.create', compact('products'));
    }

    public function store(GalleryRequest $request)
    {
        $data = $request->except('_token');
        if ($request->hasFile('images')) {
            $data['images'] = $request->file('images')->store(
                'assets/gallery', 'public'
            );
        }
        Gallery::create($data);
        return redirect()->route('gallery.index')->withSuccessMessage('gambar berhasil ditambah');

    }

    public function edit(Gallery $gallery)
    {
        $products = Product::all();
        return view('admin.gallery.edit', compact('products', 'gallery'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        if ($request->hasFile('images')) {
            $data['images'] = $request->file('images')->store(
                'assets/gallery', 'public'
            );
        }
        $gallery = Gallery::findOrFail($id);
        $gallery->update($data);
        return redirect()->route('gallery.index')->withSuccessMessage('data berhasil ditambah');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('gallery.index')->with('delete', 'data berhasil dihapus');
    }
}
