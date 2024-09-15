@extends('layouts.app')

@section('page-title')
購入ページ
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>
@endsection

@section('search')
<form action="/search" method="post" class="search-form">
    @csrf
    <input type="text" name="keyword" placeholder="なにをお探しですか？">
    <button type="submit">検索</button>
</form>
@endsection

@section('link')
<div class="link-list">
    <li><a href="{{ route('logout') }}">ログアウト</a></li>
    <li><a href="">マイページ</a></li>
    <li><a href="" class="put-up">出品</a></li>
</div>
@endsection

@section('content')
<div class="main-board">
    <div class="item-board">
        <div class="item-description">
            <div class="item-picture">
                <img src="{{ $item->image }}" alt="商品画像">
            </div>
            <div class="item-info">
                <div class="name">{{ $item->name }}</div>
                <div class="price">¥{{ number_format($item->price) }}</div>
            </div>
        </div>
        <div class="chose-payment">
            <div class="payment-method">
                <div class="title">支払方法</div>
                <div class="input-method">
                    <select name="payment_id" id="select">
                        <option value="" selected>選択してください</option>
                        <option value="1">カード払い</option>
                        <option value="2">コンビニ払い</option>
                        <option value="3">銀行振込</option>
                    </select>
                    <script src="{{ asset('js/confirm.js') }}"></script>
                </div>
            </div>
        </div>
        <div class="shipping-address">
            <form action="{{ route('address', ['item_id' => $item->id]) }}" method="get">
                @csrf
                <div class="title"> 配送先</div>
                <div class="input-address">
                    <div class="address">{{ $address->address." ".$address->building}}</div>
                    <button type="submit">変更する</button>
                </div>
            </form>
        </div>
    </div>
    <div class="confirm-board">
        <div class="confirm-card">
            <table class="table">
                <tr>
                    <th>商品代金</th>
                    <td>¥{{ number_format($item->price) }}</td>
                </tr>
                <tr>
                    <th> </th>
                    <td> </td>
                </tr>
                <tr>
                    <th> </th>
                    <td> </td>
                </tr>
                <tr>
                    <th>支払金額</th>
                    <td>¥{{ number_format($item->price) }}</td>
                </tr>
                <tr>
                    <th>支払方法</th>
                    <td>
                        <div id="method"></div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="purchase-button">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type="hidden" name="price" value="{{ $item->price }}">
                <input type="hidden" name="payment_id" id="input">
                <button type="submit">購入する</button>
            </form>
        </div>
    </div>
</div>
@endsection