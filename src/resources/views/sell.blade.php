@extends('layouts.app')

@section('page-title')
出品ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<main class="main-board">
    <div class="title">
        <p>商品の出品</p>
    </div>
    <div class="item-image">
        商品画像<br>
        <div class="image-card">
            <a href="">画像を選択する</a>
        </div>
    </div>
    <form action="" method="post" class="input-form">
        <div class="item-class">
            <div class="sub-title">
                <p>商品の詳細</p>
            </div>
            <p>カテゴリー</p>
            <select name="category" id=""></select>
            <p>商品の状態</p>
            <select name="condition" id=""></select>
        </div>
        <div class="item-info">
            <div class="sub-title">
                <p>商品名と説明</p>
            </div>
            <p>商品名</p>
            <input type="text" name="name">
            <p>商品の説明</p>
            <textarea name="detail" id=""></textarea>
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
    </form>

</main>
@endsection