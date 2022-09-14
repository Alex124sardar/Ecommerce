<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addTocart(Request $request)
    {
        try {
            if (auth()->user()) {
                $new_cart_item = new cart();
                $new_cart_item->user_id = auth()->user()->id;
                $new_cart_item->product_id = $request->product_id;
                $product_prices = Product::find($request->product_id);
                $new_cart_item->product_price = $product_prices->unit_price;
                $new_cart_item->total_price = $request->quality * $new_cart_item->product_price;
                $new_cart_item->quantity = $request->quantity;
                $new_cart_item->save();


                return response([
                    'status' => 200
                ]);
            } else {
               return response([
                'status'=>300
               ]);
            }
        } catch (\Throwable $th) {
            return response([
                'status' => 400,
                'message' => $th
            ]);
        }
    }
}