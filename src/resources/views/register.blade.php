@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
@endsection

@section('content')
<div class="register">
    <h2 class="register-title">商品登録</h2>

    <form action="/products" method="post" enctype="multipart/form-data">
        @csrf

        <label class="form__label">商品名<span class="require">必須</span></label>
        <input class="form__text" type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
        <div class="form__error">
            @error('name')
                {{ $message}}
            @enderror
        </div>

        <label class="form__label">値段<span class="require">必須</span></label>
        <input class="form__text" type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
        <div class="form__error">
            @error('price')
                {{ $message}}
            @enderror
        </div>

        <label class="form__label">商品画像<span class="require">必須</span></label>
        <input class="form__file" type="file" name="image" required>
        <div class="form__error">
            @error('image')
                {{ $message}}
            @enderror
        </div>

        <label class="form__label">季節<span class="require">必須</span><span class="note">複数選択可</span></label>

        <div class="season-list">
            @foreach ($seasons as $season)
                <label class="season-item">
                    <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) ? 'checked' : '' }}>
                    {{ $season->season_name }}
                </label>
            @endforeach
        </div>
        
        <div class="form__error">
        @error('seasons')
            {{ $message }}
        @enderror
        </div>

        <label class="form__label">商品説明<span class="require">必須</span></label>
        <textarea class="form__textarea" name="description" cols="40" rows="5" id="" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
        <div class="form__error">
            @error('description')
                {{ $message}}
            @enderror
        </div>

    <div class="button-content">
            <a href="/products" class="back">戻る</a>
            <button class="button-register" type="submit">
                登録
            </button>
        </div>
    </form>
</div>

@endsection