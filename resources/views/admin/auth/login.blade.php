@vite('resources/css/admin_login.css')

<div class="page-wrapper">

    <a class="header-link" href="{{ route('admin.register') }}">新規会員登録はこちら</a>

    <div class="login-page">

        <h1 class="page-title">管理画面ログイン</h1>

        <form class="login-form" method="POST" action="{{ route('admin.login') }}">
            @csrf

            @error('message')
                <div class="alert">{{ $message }}</div>
            @enderror

            <div class="form-row">
                <label for="email">メールアドレス</label>

                <div class="input-area">
                    <input
                        type="text"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        maxlength="255"
                        class="@error('email') input-error @enderror"
                    />

                    @error('email')
                        @if ($message !== 'The email field is required.')
                            <div class="alert">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <label for="password">パスワード</label>

                <div class="input-area">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        maxlength="20"
                        class="@error('password') input-error @enderror"
                    />

                    @error('password')
                        @if ($message !== 'The password field is required.')
                            <div class="alert">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
            </div>

            <div class="form-submit">
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>