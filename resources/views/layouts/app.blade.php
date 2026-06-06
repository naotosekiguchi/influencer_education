<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
    <script></script>
    @yield('scripts')
</body>
</html>
