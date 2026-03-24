<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>

    <div class="container">
        <script src="{{ asset('js/Admin/Article_list.js') }}"></script>

        <!-- プロフィール変更アラート -->
        @if (session('profile_edit_message'))
            <script>
                profileeditAlert("{{ session('profile_edit_message') }}");
            </script>
        @endif

        <!-- お知らせ変更アラート -->
        @if (session('article_edit_message'))
            <script>
                articleeditAlert("{{ session('article_edit_message') }}");
            </script>
        @endif
        @yield('content')

    </div>
</body>
</html>