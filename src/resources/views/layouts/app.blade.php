<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    @yield('css')
</head>

<body>
    <header class="page-header">
        <div>@yield('logo')</div>
        <div class="search-form">@yield('search')</div>
        <div class="navigation">@yield('link')</div>
    </header>
    @yield('content')
</body>

</html>