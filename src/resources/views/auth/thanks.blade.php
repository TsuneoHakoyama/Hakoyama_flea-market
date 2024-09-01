@extends('layouts.app')

@section('page-title')
会員登録
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('logo')
<a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
@endsection

@section('content')
<main class="main-board">
    <div class="message">
        会員登録ありがとうございます
    </div>
    <div class="for-login">
        <a href="{{ route('login') }}">ログインする</a>
    </div>
</main>
@endsection