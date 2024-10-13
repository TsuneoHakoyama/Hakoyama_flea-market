@extends('layouts.app')

@section('page-title')
管理者ログイン
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>
@endsection

@section('content')
<main class="main-board">
    <div class="title">
        <p>管理者ログイン</p>
        @if (session('logout_msg'))
        <div class="alert alert-success">
            {{ session('logout_msg') }}
        </div>
        @endif
    </div>
    <form action="{{ route('admin.login.login') }}" method="post" class="input-form">
        @csrf
        <div class="input-email">
            メールアドレス<br>
            <input type="email" name="email">
        </div>
        <div class="error-message">
        </div>
        <div class="input-password">
            パスワード<br>
            <input type="password" name="password">
        </div>
        <div class="error-message">
        </div>
        <div class="submit">
            <button type="submit">ログイン</button>
        </div>
    </form>
</main>
@endsection