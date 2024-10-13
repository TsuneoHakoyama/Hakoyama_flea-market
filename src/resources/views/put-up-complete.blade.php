@extends('layouts.app')

@section('page-title')
出品完了
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/put-up-complete.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>
@endsection

@section('content')
<main class="main-board">
    <div class="message">
        出品が完了しました
    </div>
    <div class="for-home">
        <a href="{{ route('home') }}">Homeへ</a>
    </div>
</main>
@endsection