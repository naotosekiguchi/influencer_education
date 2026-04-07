@extends('layouts.app')

@section('title', 'ユーザー進捗')
<head>
    <link href="{{ asset('css/curriculum_progress.css') }}" rel="stylesheet">
</head>
@section('content')
<!-- 戻るボタン -->
<a href="{{ route('user.show.top') }}">← 戻る</a>

<div class="profile">
    <!-- プロフィール画像 -->
    <img src="{{ $user->profile_image ? asset($user->profile_image) : asset('storage/images/profile/no_image.png') }}" alt="プロフィール画像" class="profile_image">
    <!-- ユーザー名 -->
    <h3>{{ $user->name }}さんの授業進捗</h3>
    <!-- ユーザーの学年 -->
    <p>現在の学年: {{ $user->grade_name }}</p>
</div>
<div class="curriculum">
    <!-- 学年ごとの授業タイトル -->
    <div class="row"> 
        @foreach ($grades as $grade)
            <div class="grade">
                <h4>{{ $grade->name }}</h4>
                <ul>
                    @foreach ($curriculums->where('grade_id', $grade->id) as $curriculum) <!-- 学年ごとにカリキュラムを表示 -->
                        <li>
                            @if ($curriculumsProgress->contains('curriculums_id', $curriculum->id)) 
                                <span>受講済</span>
                            @endif
                            {{-- <a href="{{ route('user.show.delivery', ['id'=>$curriculum->id]) }}"> --}}{{ $curriculum->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
    <!-- 3学年ごとに横並びにするために、3つ目で区切りを入れる -->
    @if ($loop->iteration % 3 == 0)
    </div><div class="row">
    @endif
        @endforeach
</div>
@endsection