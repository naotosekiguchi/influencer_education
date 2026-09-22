@vite('resources/css/admin_register.css')

<div class="page-wrapper">

    <a class="header-link" href="{{ route('admin.login') }}">ログインはこちら</a>

    <div class="login-page">

        <h1 class="page-title">新規管理ユーザー登録</h1>

        <form class="login-form" method="POST" action="{{ route('admin.register.store') }}">
            @csrf

            <div class="form-row">
                <label for="name">ユーザーネーム</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    maxlength="255"
                    class="@error('name') input-error @enderror"
                />
            </div>

            <div class="form-row">
                <label for="kana">カナ</label>
                <input
                    type="text"
                    name="kana"
                    id="kana"
                    value="{{ old('kana') }}"
                    maxlength="255"
                    class="@error('kana') input-error @enderror"
                />
            </div>

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

            <div class="form-row">
                <label for="password_confirmation">パスワード確認</label>

                <div class="input-area">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        maxlength="20"
                        class="@error('password_confirmation') input-error @enderror"
                    />

                    @error('password_confirmation')
                        @if ($message !== 'The password confirmation field is required.')
                            <div class="alert">{{ $message }}</div>
                        @endif
                    @enderror
                </div>
            </div>

            <div class="form-submit">
                <button type="submit">登録</button>
            </div>

        </form>
    </div>
</div>