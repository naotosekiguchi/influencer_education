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
        .banner-container {
            padding: 5px 270px 50px;
        }
    
    /* =========================
    　　　　　戻るリンク
    ========================= */
        .back-link {
            display: inline-block;
            margin: 0 0 10px 30px;
            text-decoration: none;
            font-size: 30px;
            color: #000;
        }

        .back-link:hover {
            text-decoration: underline;
            text-decoration-thickness: 2px;
        }

    /* =========================
    　　　　　ページタイトル
    ========================= */

        .page-title {
            margin: 10px 0 30px 40px;
            font-size: 43px;
        }
    
    /* =========================
    　　　　　　バナー
    ========================= */
        .banner-item {
            display: flex;
            align-items: center;
            gap: 60px;
            margin-bottom: 10px;
        }

        .banner-image {
            width: 240px;
            height: 140px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .btn-delete {
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            background: #ff3b30;
            color: #fff;
            font-size: 28px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #de270f;
        }

        .btn-add {
            margin: 0 200px;
            width: 40px;
            height: 40px;
            border: none;
            border-radius: 50%;
            background: #0cb63f;
            color: #fff;
            font-size: 26px;
            cursor: pointer;
        }

        .btn-add:hover {
            background: #079029;
        }

        .btn-register {
            display: block;
            width: 260px;
            height: 40px;
            margin: 40px auto 0;
            border: none;
            background-color: #50555a;
            color: #fff;
            font-size: 26px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #212325;
        }
    
        .btn-file {
            display: inline-block;
            padding: 0px 25px;
            border: 1px solid #999;
            background: #f5f5f5;
            cursor: pointer;
            font-size: 25px;
        }

        .btn-file:hover {
            background: #e5e5e5;
        }

    /* =========================
    フラッシュメッセージ
    ========================= */

        .success-message {
            position: fixed;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px 30px;
            background: #181918;
            color: #fff;
            border-radius: 6px;
            font-size: 18px;
            box-shadow: 0 3px 8px rgba(0,0,0,.2);
            opacity: 1;
            z-index: 9999;
        }
    
    </style>
    
    @section('content')

    <a href="{{ route('admin.top') }}" class="back-link">←戻る</a>

    <h1 class="page-title">バナー管理</h1>

    @if(session('success'))
        <div id="success-message" class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST"
        action="{{ route('admin.banner.update') }}"
        enctype="multipart/form-data">
    @csrf
    
        <div class="banner-container">

            @foreach ($banners as $banner)

                <div class="banner-item">

                    <img src="{{ asset($banner->image) }}" alt="バナー画像" class="banner-image">

                    <input
                        type="hidden"
                        name="banner_ids[]"
                        value="{{ $banner->id }}"
                    >
                
                    <input
                        type="file"
                        id="banner{{ $banner->id }}"
                        name="banners[{{ $banner->id }}]"
                        class="banner-file"
                        hidden
                    >

                    <label
                        for="banner{{ $banner->id }}"
                        class="btn-file"
                    >
                        ファイルを選択
                    </label>
                    
                    <button type="button" class="btn-delete">
                        －
                    </button>
                </div>
            @endforeach

        </div>

        <button type="button" id="add-banner" class="btn-add">
            ＋
        </button>

        <button type="submit" class="btn-register">
            登録
        </button>
    </form>
    
    <script>

        const addButton = document.getElementById('add-banner');
        const container = document.querySelector('.banner-container');

        // バナー追加
        addButton.addEventListener('click', function () {

            const id = Date.now();
        
            container.insertAdjacentHTML('beforeend', `
                <div class="banner-item">
        
                    <img src="https://placehold.co/240x140"
                        class="banner-image"
                        alt="バナー画像">
        
                    <input
                        type="file"
                        id="new-banner-${id}"
                        name="new_banners[]"
                        class="banner-file"
                        hidden>
                    
                    <label
                        for="new-banner-${id}"
                        class="btn-file">
                        ファイルを選択
                    </label>
        
                    <button type="button" class="btn-delete">
                        －
                    </button>
        
                </div>
            `);
        
        });

        // バナー削除
        container.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-delete')) {
                event.target.closest('.banner-item').remove();
            }

        });

        // 選択画像をプレビュー表示
        document.addEventListener('change', function (event) {
            if (event.target.type === 'file') {
                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                const image = event.target
                    .closest('.banner-item')
                    .querySelector('.banner-image');

                image.src = URL.createObjectURL(file);
            }

        });

        // フラッシュメッセージを3秒後に非表示
        const message = document.getElementById('success-message');
            if (message) {

                setTimeout(function () {
                    message.style.display = 'none';
                }, 3000);
        }
        </script>
    @endsection