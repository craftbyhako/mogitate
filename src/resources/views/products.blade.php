@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css')}}">
@endsection

@section('content')
<div class="products-index">
  <h2 class="products-index__heading ">商品一覧</h2>
  <div class="contact-form__inner">

    <!-- ＃＃＃サイドバー＃＃＃ -->
    <aside class="sidebar">
      <div>
        <form method="GET" action="★★★"></form>

        <!-- キーワード検索 -->
            <input type="text" name="keyword" value="★★★★" placeholder="商品名で検索">
            <a href="">
                <button>検索</button>
            </a>
      </div>
       <!-- 並び替え -->
      <div>
        <p>価格順で表示</p>
        <select name="sort" onchange="this.form.submit() placeholder="価格で並べ変え"></select>
        <option name="high" value="haigh"{{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
        <option name="low" value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順に表示</option>
    </aside>

    <!-- ＃＃＃メインコンテンツ＃＃＃ -->
     <!-- キウイ -->
    <ul class="product-list">
  <li class="product-card">
    <img src="product1.jpg" alt="商品画像">
    <h2>商品名</h2>
    <p>価格: ¥3,000</p>
  </li>
  <li class="product-card">
    <img src="product2.jpg" alt="商品画像">
    <h2>商品名</h2>
    <p>価格: ¥5,000</p>
  </li>


@endsection