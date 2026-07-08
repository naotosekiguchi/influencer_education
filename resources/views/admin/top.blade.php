<style>
/* =========================
　　ベース設定
========================= */
    /* 
     * ブラウザ標準の余白をリセット
     * レイアウト計算をシンプルにするため必須
     */
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

/* =========================
　　レイアウト
========================= */
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
　　　管理者情報
========================= */

    .admin-info-box {
        margin-top: 110px;
        width: 1100px;
        height: 200;
        padding: 30px;
        border: 0.8px solid #191818;
    }

    .admin-info-row {
        display: flex;
        padding: 15px 0;
        font-size: 22px;
        color: #898585;
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


<header class="admin-header">

    <button class="btn-header">授業管理</button>
    <button class="btn-header">お知らせ管理</button>
    <a href="{{ route('admin.banner.index') }}" class="btn-header">バナー管理</a>

    <form class="logout-form" method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button class="btn-logout" type="submit">ログアウト</button>
    </form>
</header>



    @if (session('message'))
        <dialog id="dialog">
            <p>{{ session('message') }}</p>
        </dialog>
    @endif


<div class="page-wrapper">

    <div class="admin-info-box">

        <div class="admin-info-row">
            <span>ユーザーネーム :&nbsp;</span>
            <span>{{ Auth::guard('admin')->user()->name }}</span>
        </div>

        <div class="admin-info-row">
            <span>メールアドレス :&nbsp;</span>
            <span>{{ Auth::guard('admin')->user()->email }}</span>
        </div>
    </div>
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
