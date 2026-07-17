@extends('admin.layouts.app')

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

</style>

@section('content')

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

@endsection
