@extends('layouts.app')

@section('page-title')
購入完了
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase-complete.css') }}">
@endsection

@section('logo')
<a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
@endsection

@section('content')
<main class="main-board">
    <div class="message">
        購入ありがとうございます
    </div>
    <div class="for-home">
        <a href="{{ route('home') }}">Homeへ</a>
    </div>
</main>
@endsection