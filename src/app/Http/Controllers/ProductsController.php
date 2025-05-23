<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductsController;

class ProductsController extends Controller
{
    public function store(Request $request){
    // //    バリデーション
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'price' => 'required|numeric',
    //     'image_url' => 'nullable|url',
    // ]);
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $request->image,
        'season' => $request->season,
        'explanation' => $request->explanation,
    ]);

    return redirect()->route('/products');
    }


    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }
}

