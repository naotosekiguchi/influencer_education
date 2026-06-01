<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="user-top-container">
        <div class="lesson-back-nav">
            <a href="javascript:history.back()" class="back-link">←戻る</a>
        </div>

        <div class="lesson-flex-layout">
            <div class="lesson-main-content">
                <div class="video-frame">
                    <div class="video-inner">
                        <video src="{{ $lesson->video_url }}" controls style="width:100%; height:100%;"></video>
                    </div>

                    {{-- 配信期間外のマスク表示 --}}
                    @if (!$isAvailable)
                        <div class="video-mask">
                            <p style="font-size: 1.5rem; font-weight: bold;">配信期間外</p>
                        </div>
                    @endif
                </div>

                <div class="grade-tag-cyan">
                    {{ $lesson->grade_name }}
                </div>

                <h1 class="lesson-display-title">
                    {{ $lesson->title }}
                </h1>

                <div class="lesson-description">
                    <p class="desc-label">講座内容</p>
                    <div class="desc-body">
                        {!! nl2br(e($lesson->description)) !!}
                    </div>
                </div>
            </div>

            <div class="lesson-sidebar">
                <div class="action-box">
                    
                    @if ($isCleared)
                        {{-- 状態：受講済み --}}
                        <button class="btn-attended-pill btn-cleared" disabled>
                            受講済み
                        </button>
                    @elseif (!$isAvailable)
                        {{-- 状態：配信期間外（グレー） --}}
                        <button class="btn-attended-pill btn-unavailable" disabled>
                            配信期間外
                        </button>
                    @else
                        {{-- 状態：通常（受講可能） --}}
                        <form action="{{ route('lessons.complete', $lesson->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-attended-pill">
                                受講しました
                            </button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- トースト通知 --}}
    @if (session('toast_message'))
        <div id="toast-notify">
            {{ session('toast_message') }}
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-notify');
                if(toast) {
                    toast.style.transition = 'opacity 0.5s';
                    toast.style.opacity = '0';
                    setTimeout(() => toast.remove(), 500);
                }
            }, 3000);
        </script>
    @endif
</x-app-layout>