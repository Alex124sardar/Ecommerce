<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\support\Facades\Auth;

class FrontendController extends Controller
{
    function index()
    {
        $category = Category::all();
        $product = Product::all();
        return view('frontend.index', compact('category', 'product'));
    }

    function cart()
    {
        if (Auth::user()) {
            $category = Category::all();
            $product = Product::all();
            $cart_item  = Cart::where('user_id', '=', Auth::user()->id)
            ->get();
            return view('frontend.cart.index', compact('category', 'product','cart_item'));
        } else {
            return redirect('/login');
        }
    }
    function checkout()
    {
        return view('frontend.checkout.index');
    }
} 

