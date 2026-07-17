<style>
/* =========================
　　　　　　ベース設定
========================= */

    /* 
     * ブラウザ標準の余白をリセット
     * レイアウト計算をシンプルにするため必須
     */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    /*
     * 画面全体を中央寄せするラッパー
     * ・min-height: 100vh → 画面高さいっぱいを確保
     * ・flex中央寄せ → ログイン画面を常に中央表示
     * ・padding → スマホで上下が切れないようにする保険
     */
    .page-wrapper {
        min-height: 100vh;
        display: flex;
        justify-content: center;  /* 横中央 */
        padding: 40px 20px;       /* 小画面対応（重要） */
    }
    .header-link {
        position: absolute;
        top: 100px;
        right: 120px;
        font-size: 25px;
        color: #999;
        text-decoration: none;
    }

    .header-link:hover {
        text-decoration: underline;
    }

    .login-page {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 120px;
    }

/* =========================
　　　　　　タイトル
========================= */
    .page-title {
        margin: 20px 0 160px;
        font-size: 82px;
        font-weight: normal;
        color: #757373;
    }

    .login-form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

/* =========================
　　　　　　入力
========================= */
    .form-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 50px;
    }

    .form-row label {
        width: 250px;
        text-align: right;
        margin-right: 20px;
        font-size: 25px;
        color: #807e7e;
        /* background: red; */
    }

    .form-row input {
        width: 670px;
        padding: 8px 10px;
        border: 1px solid #a2a1a1;
        font-size: 32px;
    }

    .input-error {
        border: 1.5px solid #dc3545 !important;
    }

    .form-row input:focus {
        outline: none;
        border-color: #818080;
    }

    .input-area {
        display: flex;
        flex-direction: column;
        width: 670px;
    }

    .input-area .alert {
        min-height: 20px;
        margin-top: 5px;
        font-size: 12px;
        color: #c00;
    }

    .login-form > .alert {
        margin-bottom: 16px;
        font-size: 12px;
        color: #c00;
    }

/* =========================
　　　　　　ボタン
========================= */
    .form-submit {
        margin-top: 60px;
        text-align: center;
    }

    .form-submit button {
        padding: 0px 45px;
        background: #696868;
        color: #fff;
        border: none;
        font-size: 48px;
        cursor: pointer;
    }

    .form-submit button:hover {
        background: #444;
    }
</style>

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
</div>