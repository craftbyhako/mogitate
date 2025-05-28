@extends('layouts.app')

<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css')}}">
@endsection

@section('content')
<div class="products-index">
  <h2 class="products-index__heading ">商品一覧</h2>
  <div class="products-index__inner">

    <!-- ＃＃＃サイドバー＃＃＃ -->
    <aside class="sidebar">
      <div>
        <form method="GET" action="{{ route('products.index') }}"></form>

        <!-- キーワード検索 -->
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名で検索">
            <button type="submit">検索</button>
      </div>
       <!-- 並び替え -->
      <div>
        <p>価格順で表示</p>
        <select name="sort" onchange="this.form.submit() placeholder="価格で並べ変え">
            <option name="high" value="high"{{ request('sort') == 'high' ? 'selected' : '' }}>高い順に表示</option>
            <option name="low" value="low" {{ request('sort') == 'low' ? 'selected' : '' }}>低い順に表示</option>
        </select>
        </form>
    </aside>

    <!-- ＃＃＃メインコンテンツ＃＃＃ -->
    <div class="index">
      <div class="register-button__wrapper">
        <button class="register-button" type=button onclick="location.href='/register'" >+ 商品を追加
        </button>
      </div>
    

      <ul class="product-list">
        @foreach ($products as $product)
            <li class="product-card">
              <a href="{{ route('products.update-form', ['productId' => $product->id]) }}">
                <div class="card-image">
                 <img  src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" >
                </div>
                <div class="tag">
                  <p>{{ $product->name }}</p>
                  <p>￥{{ $product->price }}</p>
                </div>
              </a>
            </li> 
        @endforeach
      </ul>
      <div class="pagination">
      {{ $products->links() }}
      </div>
    </div>
@endsection