@extends('layouts.app')

@section('page-title')
管理画面
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>
@endsection

@section('link')
<div class="link-list">
    <li><a href="{{ route('admin.login.logout') }}">ログアウト</a></li>
</div>
@endsection

@section('content')
<div class="title">ユーザー一覧</div>
@if(session('remove_msg'))
{{ session('remove_msg')}}
@endif
@if(session('email_msg'))
{{ session('email_msg') }}
@endif
@if(session('send_fail_msg'))
{{ session('send_fail_msg') }}
@endif
<table class="user-list">
    <tr>
        <th>名前</th>
        <th>E-mail</th>
        <th>郵便番号</th>
        <th>住所</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ optional($user->profile)->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ optional($user->profile)->postcode }}</td>
        <td>{{ optional($user->profile)->address . optional($user->profile)->building }}</td>
        <td><a href="{{ route('admin.comment', ['user_id' => $user->id]) }}">コメント</a></td>
        <td>
            <form action="{{ route('admin.send.mail') }}" method="get">
                @csrf
                <input type="hidden" name="email" value="{{ $user->email }}">
                <button type="submit">メール送信</button>
            </form>
        </td>
        <td>
            <form action="{{ route('admin.user.delete') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection