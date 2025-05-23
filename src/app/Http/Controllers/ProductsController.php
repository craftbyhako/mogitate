<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\RegisterRequest;

class ProductsController extends Controller
{
    public function store(RegisterRequest $request){
    
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imagePath,
        'season' => $request->season,
        'explanation' => $request->explanation,
    ]);

    return redirect('/products');
    }


    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
    }
}

