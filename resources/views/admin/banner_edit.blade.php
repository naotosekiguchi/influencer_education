@extends('admin.layouts.app')

@section('styles')
    @vite('resources/css/admin_banner.css')
@endsection

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