<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="register-layout-root">
        
        <div class="top-nav-link">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </div>

        <h1 class="main-title">新規会員登録</h1>

        <form method="POST" action="{{ route('register') }}" class="registration-form">
            @csrf

            <div class="form-row">
                <label for="name" class="label-side">ユーザーネーム</label>
                <div class="input-side">
                    <x-text-input id="name" class="input-width-400" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="error-text" />
                </div>
            </div>

            <div class="form-row">
                <label for="kana" class="label-side">カナ</label>
                <div class="input-side">
                    <x-text-input id="kana" class="input-width-400" type="text" name="kana" :value="old('kana')" required />
                    <x-input-error :messages="$errors->get('kana')" class="error-text" />
                </div>
            </div>

            <div class="form-row">
                <label for="email" class="label-side">メールアドレス</label>
                <div class="input-side">
                    <x-text-input id="email" class="input-width-400" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="error-text" />
                </div>
            </div>

            <div class="form-row">
                <label for="password" class="label-side">パスワード</label>
                <div class="input-side">
                    <x-text-input id="password" class="input-width-400" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="error-text" />
                </div>
            </div>

            <div class="form-row">
                <label for="password_confirmation" class="label-side">パスワード確認</label>
                <div class="input-side">
                    <x-text-input id="password_confirmation" class="input-width-400" type="password" name="password_confirmation" required />
                </div>
            </div>

            <div class="footer-action">
                <button type="submit" class="btn-submit-orange">
                    登録
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>