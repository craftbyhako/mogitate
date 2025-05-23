@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('content')
<h2>商品登録</h2>

<form action="/products" method="post" enctype="multipart/form-data">
    @csrf
    <h3>商品名<span>必須</span></h3>
    <input type="text" name="product_name" placeholder="商品名を入力">
    <div class="form__error">
    @error('name')
        {{ $message}}
    @enderror
    </div>

    <h3>値段<span>必須</span></h3>
    <input type="text" name="price" placeholder="値段を入力">
    <div class="form__error">
    @error('price')
        {{ $message}}
    @enderror
    </div>

    <h3>商品画像<span>必須</span></h3>
    <input type="file" name="image" required>ファイルを選択
    <div class="form__error">
    @error('image')
        {{ $message}}
    @enderror
    </div>

    <h3>季節<span>必須</span></h3>
    <input type="radio" name="season" value="spring">春
    <input type="radio" name="season" value="summer">夏
    <input type="radio" name="season" value="autumn">秋
    <input type="radio" name="season" value="winter">冬
    <div class="form__error">
    @error('season')
        {{ $message}}
    @enderror
    </div>

    <h3>商品説明<span>必須</span></h3>
    <textarea name="explanation" cols="40" rows="5" id=""></textarea>
    <div class="form__error">
    @error('explanation')
        {{ $message}}
    @enderror
    </div>

    <a href="/products">戻る</a>
    <a href="/products"><button type="submit">登録</button></a>
</form>
@endsection