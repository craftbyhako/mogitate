<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\RegisterRequest;

class ProductsController extends Controller
{
    public function store(RegisterRequest $request){
    

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }else{
        $imagePath = null;
    }

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imagePath,
        'season' => $request->season,
        'description' => $request->description,
    ]);

    return redirect('/products');
    }


    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }
}

