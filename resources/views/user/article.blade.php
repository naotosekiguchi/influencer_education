@extends('layouts.app')

@section('title', 'お知らせ詳細')

@section('content')
<!-- 戻るボタン -->
<a href="{{ route('user.show.top') }}">← 戻る</a>

<div class="container">
    <p>{{ $article->posted_date }}</p> <!-- 投稿日時 -->
    <h2>{{ $article->title }}</h2> <!-- お知らせのタイトル -->
    <div>
        <p>{{ $article->article_contents }}</p> <!-- お知らせの本文 -->
    </div>
</div>
@endsection