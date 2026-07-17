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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    /* =========================
    　　  共通ヘッダー
    ========================= */
        .admin-header {
            display: flex;
            align-items: center;
            gap: 15px;
            height: 140px;
            padding: 0 65px;
            background-color: #1af3f3fe;
            
        }
        .btn-header {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            width: 220px;
            height: 60px;
            border: none;
            border-radius: 15px;
            font-size: 30px;
            color: #fff;
            background-color: #625f5f;
        }
        .btn-header:hover {
            background-color: #a39f9f;
        }
        .logout-form {
            margin-left: auto;
        }
        .btn-logout {
            background: none;
            border: none;
            color: #ffffff;
            font-size: 40px;
            font-weight: normal;
        }
        .btn-logout:hover {
            text-decoration: underline;
            text-decoration-thickness: 3px;
        }

    /* =========================
    　　　　　　ダイアログ
    ========================= */
        dialog {
            border: none;
            outline: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 5px 20px;
            font-family: Arial, sans-serif;
        }
        
    </style>
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

        <main class="py-4">
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
