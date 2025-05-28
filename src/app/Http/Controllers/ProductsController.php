<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;


class ProductsController extends Controller
{
    // store機能
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

    // index機能
    public function index()
    {
        $products = Product::with('seasons')->paginate(6);
        
        return view('products', compact('products'));
    }

    // create機能
    public function create()
    {
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    // show機能
    public function show(Product $product){
        $product->load('seasons');
        return view('products.show', compact('product'));
    }

    // edit機能
   public function edit(Product $product){

    $product->load('seasons');
    return view('products.update-form', compact('product'));
   }

    // update機能
   public function update(UpdateRequest $request,Product $product)
   {
    $product->update($request->validate());

    return redirect()->route('products.show', $product->id);
   }


    // destroy機能
    public function destroy(Product $product){
    $product->delete();

    return redirect('/products')->with('message', '商品を削除しました');

}
}