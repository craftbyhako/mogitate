@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css')}}">
@endsection

@section('content')

<!-- 更新機能 -->
<div class="card-container">
    <form action="{{ route('products.update', ['productId' =>   $product->id]) }}" method=POST>
        @csrf
        @method('PATCH')

        <nav class="breadcrumb">
            <a href="/products">商品一覧</a> &gt; <span>キウイ</span>
        </nav>

        <div class="card-info">
            <div class="card-info__img--group"></div>
                <img class="card-info__img" src="{{ asset('storage/' . $product->image) }}" alt="商品画像">
                <div class="form__error">
                @error('image')
                    {{ $message}}
                @enderror
                </div>

        <div class="card-info__content"></div>
            <h3 class="card-info__tag">商品名</h3>
                <input type="text" name="name" value="{{ $product->name }}">
            <!-- <input type="hidden" name="id" value="{{ $product['id'] }}"> -->
                <div class="form__error">
                @error('name')
                    {{ $message}}
                @enderror
                </div>

            <h3 class="card-info__tag">値段</h3>
                <input type="text" name="price" value="{{ $product->price }}" >
                <div class="form__error">
                @error('price')
                    {{ $message}}
                @enderror
                </div>

            <h3 class="card-info__tag">季節</h3>
            @foreach ($seasons as $season)
                <label>
                <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) || (isset($product) && $product->seasons->contains('id', $season->id))
                    ? 'checked' : '' 
                }}>
                    {{ $season->season_name }}
                </label>
            @endforeach
                <div class="form__error">
                @error('seasons')
                    {{ $message }}
                @enderror
                </div>
        </div>
        <h3>商品説明</h3>
            <textarea class="description" name="description" cols="40" rows="5" id="" >{{ $product->description }}</textarea>
            <div class="form__error">
                @error('description')
                    {{ $message}}
                @enderror
            </div>

        <button type="button" onclick="location.href='/products'">戻る</button>
        <button type="submit">変更を保存</button>

    </form>

<!-- 削除機能 -->
    <form action="{{ route('products.destroy', ['productId' => $product->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $product['id'] }}">
        <button type="submit">ゴミ箱</button>
    </form>


@endsection