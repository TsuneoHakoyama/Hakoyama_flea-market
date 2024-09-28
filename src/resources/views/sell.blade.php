@extends('layouts.app')

@section('page-title')
出品ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<main class="main-board">
    <form action="/sell" method="post">
        @csrf
        <div class="title">
            <p>商品の出品</p>
        </div>
        <div class="item-image">
            商品画像<br>
            <div class="image-card">
                <label class="label">
                    <input type="file" name="image">画像を選択する
                </label>
            </div>
        </div>
        <div class="input-form">
            <div class="item-class">
                <div class="sub-title">
                    <p>商品の詳細</p>
                </div>
                <p>カテゴリー</p>
                <select name="category_id" id="">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
                <p>商品の状態</p>
                <select name="condition_id" id="">
                    <option value="">選択してください</option>
                    @foreach ($conditions as $condition)
                    <option value="{{ $condition->id }}">{{ $condition->condition }}</option>
                    @endforeach
                </select>
            </div>
            <div class="item-info">
                <div class="sub-title">
                    <p>商品名と説明</p>
                </div>
                <p>商品名</p>
                <input type="text" name="name">
                <p>ブランド名</p>
                <select name="company_id" id="">
                    <option value="">選択してください</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
                <p>商品の説明</p>
                <textarea name="description" id=""></textarea>
            </div>
            <div class="item-price">
                <div class="sub-title">
                    <p>販売価格</p>
                </div>
                <p>販売価格</p>
                <input type="text" name="price">
            </div>
            <div class="submit">
                <button type="submit">出品する</button>
            </div>
        </div>
    </form>


</main>
@endsection