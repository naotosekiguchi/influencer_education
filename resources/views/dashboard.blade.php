<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="user-top-container">
        <div class="banner-section">
            <div class="banner-main" id="banner-container">
                @forelse ($banners as $index => $banner)
                    <img src="{{ asset('storage/banners/' . $banner->image) }}" 
                        alt="バナー" 
                        class="banner-img" 
                        data-index="{{ $index }}"
                        style="{{ $index === 0 ? 'display: block;' : 'display: none;' }} width: 100%; height: 100%; object-fit: cover;">
                @empty
                    <p>バナー画像</p>
                @endforelse
            </div>
            
            <div class="banner-indicators">
                @forelse ($banners as $index => $banner)
                    <span class="dot {{ $index === 0 ? 'active' : '' }}" 
                        data-index="{{ $index }}" 
                        onclick="switchBanner({{ $index }})"></span>
                @empty
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                @endforelse
            </div>
        </div>

        <div class="news-section">
            <h2 class="news-title">お知らせ</h2>
            <div class="news-list-box">
                <ul class="news-list">
                    @forelse ($articles as $article)
                        <li>
                            <a href="{{ url('/articles/'.$article->id) }}" class="news-item">
                                <span class="news-date">{{ $article->posted_date->format('Y年m月d日') }}</span>
                                <span class="news-text">{{ $article->title }}</span>
                            </a>
                        </li>
                    @empty
                        <li class="news-item">
                            <span class="news-text">現在お知らせはありません。</span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <script>
        function switchBanner(index) {
            const images = document.querySelectorAll('.banner-img');
            const dots = document.querySelectorAll('.dot');

            images.forEach(img => img.style.display = 'none');
            dots.forEach(dot => dot.classList.remove('active'));

            if (images[index]) images[index].style.display = 'block';
            if (dots[index]) dots[index].classList.add('active');
        }
    </script>
</x-app-layout>
