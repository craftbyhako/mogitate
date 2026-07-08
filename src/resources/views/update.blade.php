@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/update.css') }}">
@endsection

@section('content')

<div class="card-container">
    <form action="{{ route('products.update', ['productId' => $product->id]) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PATCH')

        <nav class="breadcrumb">
            <a href="/products">商品一覧</a> &gt;
            <span>{{ $product->name }}</span>
        </nav>

        <div class="card-info">

            <!-- 左側 -->
            <div class="card-info__img--group">

                <img
                    class="card-info__img"
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="商品画像">
                
                <p class="current-file">
                    {{ basename($product->image) }}
                </p>


                <input type="file" name="image">

                <div class="form__error">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>

            </div>

            <!-- 右側 -->
            <div class="card-info__content">

                <div class="form-group">
                    <h3 class="card-info__tag">商品名</h3>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $product->name) }}">

                    <div class="form__error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h3 class="card-info__tag">値段</h3>

                    <input
                        type="text"
                        name="price"
                        value="{{ old('price', $product->price) }}">

                    <div class="form__error">
                        @error('price')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <h3 class="card-info__tag">季節</h3>

                    @foreach ($seasons as $season)
                        <label>
                            <input
                                type="checkbox"
                                name="seasons[]"
                                value="{{ $season->id }}"
                                {{
                                    (is_array(old('seasons')) && in_array($season->id, old('seasons')))
                                    || (!old('seasons') && $product->seasons->contains('id', $season->id))
                                    ? 'checked'
                                    : ''
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

            </div>

        </div>

        <div class="description-group">
            <h3>商品説明</h3>

            <textarea
                class="description"
                name="description"
                cols="40"
                rows="5">{{ old('description', $product->description) }}</textarea>

            <div class="form__error">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="button-group">
            <button
                type="button"
                class="back-btn"
                onclick="location.href='/products'">
                戻る
            </button>

            <button
                type="submit"
                class="save-btn">
                変更を保存
            </button>
        </div>

    </form>

    <!-- 削除 
    <form action="{{ route('products.destroy', ['productId' => $product->id]) }}" method="POST">
        @csrf
        @method('DELETE')

        <input type="hidden" name="id" value="{{ $product->id }}">

        <button type="submit">ゴミ箱</button>
    </form> -->

</div>

@endsection