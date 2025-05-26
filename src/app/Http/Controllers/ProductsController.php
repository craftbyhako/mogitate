<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;

class ProductsController extends Controller
{
    public function store(RegisterRequest $request){
    

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    }else{
        $imagePath = null;
    }

    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imagePath,
        'description' => $request->description,
    ]);

    if ($request->has('seasons')) {
        $product->seasons()->attach($request->seasons);
    }

    return redirect('/products');
    }


    public function index()
    {
        $products = Product::with('seasons')->get();
        return view('products', compact('products'));
    }

    public function create()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function show(Product $product){
        $product->load('seasons');
        return view('products.show', compact('product'));
    }
}

