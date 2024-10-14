@extends('layouts.app')

@section('page-title')
ユーザーコメント一覧
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin-comment.css') }}">
@endsection

@section('logo')
<div class="logo-link">
    <a href="{{ route('home') }}"><img src="{{ asset('storage/image/logo.svg') }}" alt=""></a>
</div>
@endsection

@section('link')
<div class="link-list">
    <li><a href="{{ route('admin.index') }}">ユーザー一覧</a></li>
    <li><a href="{{ route('admin.login.logout') }}">ログアウト</a></li>
</div>
@endsection

@section('content')
<div class="main-board">
    <div class="user-name">
        <p>ユーザー名：{{ optional($user)->name }}</p>
    </div>
    <div class="message">
        @if(session('comment_msg'))
        {{ session('comment_msg')}}
        @endif
    </div>
    <table class="comment-list">
        <tr>
            <th>商品名</th>
            <th>コメント</th>
            <th>日時</th>
            <th></th>
        </tr>
        @foreach($comments as $comment)
        <tr>
            <td>{{ optional($comment->item)->name }}</td>
            <td>{{ optional($comment)->comment }}</td>
            <td>{{ optional($comment->created_at)->format('Y/m/d H:i:s') }}</td>
            <td>
                <form action="{{ route('admin.comment.delete') }}" method="post">
                    @csrf
                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                    <button type="submit" class="delete">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection