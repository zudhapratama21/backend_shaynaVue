<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('pages.products.index')->with([
            'items' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.create');
    }

   
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('products.index');
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Product::findOrFail($id);
        return view('pages.products.edit')->with([
            'items' => $item
        ]);
    }

 
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $items = Product::findOrFail($id);
        $items->update($data);
        return redirect()->route('products.index');

    }

  
    public function destroy($id)
    {
        $items = Product::findOrFail($id);
        $items->delete();
        return back();
    }
}
