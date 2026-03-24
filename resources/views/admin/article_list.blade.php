@extends('layouts.app')

@section('title', 'お知らせ一覧')

@section('content')


<!-- 戻るボタン -->
{{-- <a href="{{ route('admin.show.top') }}">← 戻る</a> --}}

<h2>お知らせ一覧</h2>

<!-- 新規登録ボタン -->
{{-- <a href="{{ route('admin.show.article.create') }}">新規登録</a> --}}

<!-- お知らせ一覧テーブル -->
<div class="articles">
    <table id="articleTable">
        <thead>
            <tr>
                <th>投稿日時</th>
                <th>タイトル</th>
                <th>
            </tr>
        </thead>
        <tbody id="article_list">
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->posted_date }}</td><!-- 投稿日時 -->
                <td>{{ $article->title }}</td><!-- タイトル -->
                <td>
                    <button type="submit">
                        <a href="{{route('admin.show.article.edit', ['id'=>$article->id]) }}">変更する</a>
                    </button>
                    
                    <button type="submit"><a href="{{route('admin.delete.article', ['id'=>$article->id]) }}" 
                        onclick="deleteAlert(event)">削除</a>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection