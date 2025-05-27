@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css')}}">
@endsection

@section('content')

<h3>商品名<span>必須</span></h3>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
    <div class="form__error">
    @error('name')
        {{ $message}}
    @enderror
    </div>

    <h3>値段<span>必須</span></h3>
    <input type="text" name="price" value="{{ old('price') }}"placeholder="値段を入力">
    <div class="form__error">
    @error('price')
        {{ $message}}
    @enderror
    </div>

    <h3>商品画像<span>必須</span></h3>
    <input type="file" name="image" required>
    <div class="form__error">
    @error('image')
        {{ $message}}
    @enderror
    </div>

    <h3>季節<span>必須</span></h3>


    @foreach ($seasons as $season)

        <label>
            <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) ? 'checked' : '' }}>
            {{ $season->season_name }}
        </label>
    @endforeach
    <div class="form__error">
    @error('seasons')
        {{ $message }}
    @enderror
    </div>

    <h3>商品説明<span>必須</span></h3>
    <textarea name="description" cols="40" rows="5" id="" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
    <div class="form__error">
    @error('description')
        {{ $message}}
    @enderror
    </div>

    <a href="/products">戻る</a>
    <button type="submit">登録</button>



@endsection