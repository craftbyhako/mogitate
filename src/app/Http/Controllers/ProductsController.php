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
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');

        $query = Product::query();

        // キーワード検査
        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        // 並び替え
        if ($sort === 'high') {
            $query->orderBy('price', 'desc');
        } elseif ($sort === 'low') {
            $query->orderBy('price', 'asc');
        }


        $products = $query->paginate(6)->appends($request->query());
               
        return view('products', compact('products', 'keyword', 'sort'));
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
        $seasons = Season::all();
        return view('update', compact('product', 'seasons'));
    }

    // edit機能
   public function edit(Product $product){

    $product->load('seasons');
    $seasons = \App\Models\Season::all();
    return view('update', compact('product', 'seasons'));
   }

    // update機能
   public function update(UpdateRequest $request, Product $product)
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