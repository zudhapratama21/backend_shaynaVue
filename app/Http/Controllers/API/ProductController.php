<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit',6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::with('galleries')->find($id);

            if ($product) {
                return ResponseFormatter::success($product,'Data Produk berhasil di ambil');
            }else {
                return ResponseFormatter::error(null,'Data tidak di temukan',404);
            }

        }

        if ($slug) {
            $product = Product::with('galleries')->where('slug',$slug)->first();

            if ($product) {
                return ResponseFormatter::success($product,'Data Produk berhasil di ambil');
            }else {
                return ResponseFormatter::error(null,'Data tidak di temukan',404);
            }

        }

         $product = Product::with('galleries');

        if ($name) {
            $product->where('name','like','%'. $name .'%');
        }

        if ($type) {
            $product->where('type','like','%'. $type .'%');
        }
        if ($price_from) {
            $product->where('price','>=',$price_from);
        }
        if ($price_to) {
            $product->where('price','<=',$price_to);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),'data list berhasil di ambil'
        );

        
    }
}
