@extends('layouts.app')

@section('page-title')
決済画面
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/payment-button.css') }}">
@endsection

@section('content')
<div class="charge">
    <form action="{{route('stripe')}}" method="POST">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ config('services.stripe.pb_key') }}"
            data-amount="{{ $param['price'] }}"
            data-name="{{ $param['name'] }}"
            data-label="決済する"
            data-description="現在はデモ画面です"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
        <input type="hidden" name="user_id" value="{{ $param['user_id'] }}">
        <input type="hidden" name="item_id" value="{{ $param['item_id'] }}">
        <input type="hidden" name="price" value="{{ $param['price'] }}">
        <input type="hidden" name="payment_id" value="{{ $param['payment_id'] }}">
    </form>
</div>

@endsection