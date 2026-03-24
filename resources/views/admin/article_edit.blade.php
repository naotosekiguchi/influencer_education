@extends('layouts.app')

@section('title', 'お知らせ変更')

@section('content')

<!-- 戻るボタン -->
<a href="{{ route('admin.show.article.list') }}">← 戻る</a>

<h2>お知らせ変更</h2>

<!-- お知らせ変更フォーム -->
<form action="{{ route('admin.submit.article.edit', ['id'=>$article->id]) }}" method="post" enctype='multipart/form-data'>
    @csrf
    <div class="container_form">
        <label for="posted_date">投稿日時<span>*</span></label>
        <input type="datetime-local" class="container_form-input" id="posted_date" name="posted_date" value="{{ $article->posted_date }}">
        @if ($errors->has('posted_date'))
            <p>{{ $errors->first('posted_date') }}</p>
        @endif
    </div>
    
    <div class="container_form">
        <label for="title">タイトル<span>*</span></label>
        <input type="text" class="container_form-input" id="title" 
            name="title" value="{{ $article->title }}">
        @if ($errors->has('title'))
            <p>{{ $errors->first('title') }}</p>
        @endif
    </div>

    <div class="container_form">
        <label for="article_contents">本文</label>
        <textarea class="container_form-input" id="article_contents" name="article_contents">{{ $article->article_contents }}</textarea>
        @if ($errors->has('article_contents'))
            <p>{{ $errors->first('article_contents') }}</p>
        @endif
    </div>
    <button type="submit" name="register">登録</button>
</form>
@endsection