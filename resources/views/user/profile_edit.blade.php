@extends('layouts.app')

@section('title', 'プロフィール設定')

@section('content')
<!-- 戻るボタン -->
{{-- <a href="{{ route('user.show.top') }}">← 戻る</a> --}}

<h2>プロフィール変更</h2>

<!-- プロフィール設定フォーム -->
<form action="{{ route('user.submit.profile.edit', ['id'=>$user->id]) }}" method="post" enctype='multipart/form-data'>
    @csrf
    <img src="{{$user->profile_image ? asset($user->profile_image) : asset('storage/images/profile/no_image.png') }}" alt="プロフィール画像" class="profile_image">
    <div class="container_form">
        <label for="profile_image">プロフィール画像</label>
        <input type="file" name="profile_image" accept=".png, .jpg, .jpeg">
    </div>

    <div class="container_form">
        <label for="name">ユーザーネーム</label>
        <input type="text" class="container_form-input" id="name" name="name">
        @if ($errors->has('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif
    </div>

    <div class="container_form">
        <label for="name_kana">カナ</label>
        <input type="text" class="container_form-input" id="name_kana" name="name_kana">
        @if ($errors->has('name_kana'))
            <p>{{ $errors->first('name_kana') }}</p>
        @endif
    </div>

    <div class="container_form">
        <label for="email">メールアドレス</label>
        <input type="text" class="container_form-input" id="email" name="email">
        @if ($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="container_form">
        <label for="email">パスワード</label>
        <button type="submit" name="password">パスワードを変更する</button>
    </div>

    <button type="submit" name="register">登録</button>
</form>				
@endsection