@extends('layouts.app')

@section('page-title')
会員登録
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>

@endsection

@section('content')
<main class="main-board">
    <div class="title">
        <p>会員登録</p>
    </div>
    <form action="/register" method="post" class="input-form">
        @csrf
        <div class="input-email">
            メールアドレス<br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="error-message">
            @if ($errors->has('email'))
            {{ $errors->first('email')}}
            @endif
        </div>
        <div class="input-password">
            パスワード<br>
            <input type="password" name="password">
        </div>
        <div class="error-message">
            @if ($errors->has('password'))
            {{ $errors->first('password')}}
            @endif
        </div>
        <div class="submit">
            <button type="submit">登録する</button>
        </div>
        <div class="page-link">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>
    </form>
</main>
@endsection