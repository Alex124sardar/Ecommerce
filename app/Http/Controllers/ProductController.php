<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $i = 1;
        $category = Category::all();
        return view('admin.product.index', compact('product', 'i', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit_price' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ]);

        $product = new  Product();
        $image = $request->file('image');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('images/productImage/', $image_new_name);
        $product->name = $request->name;
        $product->image = 'images/productImage/' . $image_new_name;
        $product->unit_price = $request->unit_price;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->save();

        return  redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $request->validate([
            'name' => 'required',
            'unit_price' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
        ]);

        $product = product::find($id);;
        $image = $request->file('image');
        $image_new_name = time() . $image->getClientOriginalName();
        $image->move('images/productImage/', $image_new_name);
        $product->name = $request->name;
        $product->image = 'images/productImage/' . $image_new_name;
        $product->unit_price = $request->unit_price;
        $product->sku = $request->sku;
        $product->category_id = $request->category_id;
        $product->update();
        return redirect()->route('index.product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }
}
