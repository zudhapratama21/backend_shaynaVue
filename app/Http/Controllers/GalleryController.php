<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;

class GalleryController extends Controller
{
    
    public function index()
    {
        $item = ProductGallery::with('products')->get();
        return view('pages.gallery.index')->with([
            'items' => $item
        ]);
    }

   
    public function create()
    {
        $item = Product::all();
        return view('pages.gallery.create',[
            'items' =>$item
        ]);
    }

    public function store(ProductGalleryRequest $request)
    {
      

        $data= $request->all();
        
        $data['photo'] = $request->file('photo')->store(
            'assets/product' , 'public'
        );

        ProductGallery::create($data);

        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = ProductGallery::findOrFail($id);
        $items->delete();
        return back();
    }
}
