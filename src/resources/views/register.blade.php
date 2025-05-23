@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('content')
<h2>商品登録</h2>

<form action="/products" method="post">
    <h3>商品名<span>必須</span></h3>
    <input type="text" placeholder="商品名を入力">

    <h3>値段<span>必須</span></h3>
    <input type="text" placeholder="値段を入力">

    <h3>商品画像<span>必須</span></h3>
    <button type="button">ファイルを選択</button>

    <h3>季節<span>必須</span></h3>
    <input type="radio" name="season" value="spring">春
    <input type="radio" name="season" value="summer">夏
    <input type="radio" name="season" value="autumn">秋
    <input type="radio" name="season" value="winter">冬

    <h3>商品説明<span>必須</span></h3>
    <textarea name="explanation" cols="40" rows="5" id=""></textarea>

    <a href="/products"><button>戻る</button></a>
    <a href="/products"><button>登録</button></a>
</form>
@endsection