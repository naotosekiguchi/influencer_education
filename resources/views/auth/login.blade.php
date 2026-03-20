<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="register-layout-root">
        
        <div class="top-nav-link">
            <a href="{{ route('register') }}">新規会員登録はこちら</a>
        </div>

        <h1 class="main-title">ログイン</h1>

        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="registration-form">
            @csrf

            <div class="form-row">
                <label for="email" class="label-side">メールアドレス</label>
                <div class="input-side">
                    <x-text-input id="email" class="input-width-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-text" />
                </div>
            </div>

            <div class="form-row">
                <label for="password" class="label-side">パスワード</label>
                <div class="input-side">
                    <x-text-input id="password" class="input-width-400"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-text" />
                </div>
            </div>

            <div class="footer-action">
                <button type="submit" class="btn-submit-orange">
                    ログイン
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>