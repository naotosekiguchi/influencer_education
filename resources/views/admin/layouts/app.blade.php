<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/admin_common.css',])
    @yield('styles')

</head>
<body>
    <div id="app">

        <header class="admin-header">

            <button class="btn-header">授業管理</button>
            <button class="btn-header">お知らせ管理</button>
            <a href="{{ route('admin.show.banner.edit') }}" class="btn-header">バナー管理</a>

            <form class="logout-form" method="POST" action="{{ route('admin.logout') }}" onsubmit="return confirm('ログアウトしますか？');">
                @csrf
                <button class="btn-logout" type="submit">ログアウト</button>
            </form>

        </header>

            @if (session('message'))
                <dialog id="dialog">
                    <p>{{ session('message') }}</p>
                </dialog>
            @endif

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        const dialog = document.getElementById('dialog');

        if (dialog) {
            dialog.show();

            setTimeout(() => {
                dialog.close();
            }, 3000);
        }
    </script>

</body>
</html>
