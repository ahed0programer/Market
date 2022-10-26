<?php

namespace App\Http\Controllers;

use App\product;
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
        //
        //$product=Product::all();
        $products=Product::latest()->paginate(5);
        return view("product.index",compact('products'));
    }
    public function trashedproducts()
    {
        //
        //$product=Product::all();
        $products=Product::onlyTrashed()->latest()->paginate(5);
        return view("product.trashedproducts",compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
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
            'name'=>'required' ,
            'price'=>'required'
        ]);

        //
        $product= new Product();
        $product->name=$request->name;
        $product->price=$request->price;
        $product->save();
        //

        ////$product=Product::create($request->all());
        return redirect()->route('products.index')
        ->with('success','product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        //$product = Product::update($request->all());
        $product->update($request->all());
        return redirect()->route('products.index')
        ->with('success', 'product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')
        ->with('success', 'product deleted successfully');
    }

    public function softDelete($id)
    {
        //
        $product=Product::find($id);
        $product->delete();
        return redirect()->route('products.index') ->with('success', 'product deleted successfully');
    }

    public function delete_for_ever($id)
    {
        //
        $product=Product::onlyTrashed();
        $product->where('id',$id)->forceDelete();
        return redirect()->route('trashed')->with('success', 'product deleted successfully');
    }

    public function restore_product($id)
    {
        //
        $product=Product::onlyTrashed();
        $product->where('id',$id)->first()->restore();

        return redirect()->route('products.index') ->with('success', 'product restored successfully');
    }
}
