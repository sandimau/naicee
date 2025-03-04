<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newArrival = Product::where('status', 1)->where('new',1)->get();
        $products = Product::where('status', 1)->inRandomOrder()->limit(10)->get();
        return view('home', compact('newArrival', 'products'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('detail', compact('product'));
    }

    public function cart()
    {
        return view('cart');
    }

    public function popular()
    {
        $products = Product::where('status', 1)->inRandomOrder()->get();
        return view('most-popular', compact('products'));
    }
}
