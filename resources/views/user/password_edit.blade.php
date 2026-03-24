@extends('layouts.app')

@section('title', 'パスワード変更')

@section('content')
<!-- 戻るボタン -->
<a href="{{ route('user.show.profile') }}">← 戻る</a>

<h2>パスワード変更</h2>

<!-- パスワード変更フォーム -->
<form action="{{ route('user.submit.password.edit', ['id'=>$user->id]) }}" method="post" enctype='multipart/form-data'>
    @csrf
    
    <div class="container_form">
        <label for="old_pass">旧パスワード</label>
        <input type="text" class="container_form-input" id="old_pass" name="old_pass">
        @if ($errors->has('old_pass'))
            <p>{{ $errors->first('old_pass') }}</p>
        @endif
    </div>

    <div class="container_form">
        <label for="new_pass">新パスワード</label>
        <input type="text" class="container_form-input" id="new_pass" name="new_pass">
        @if ($errors->has('new_pass'))
            <p>{{ $errors->first('new_pass') }}</p>
        @endif
    </div>

    <div class="container_form">
        <label for="new_pass_confirmation">新パスワード確認</label>
        <input type="text" class="container_form-input" id="new_pass_confirmation" name="new_pass_confirmation">
        @if ($errors->has('new_pass_confirmation'))
            <p>{{ $errors->first('new_pass_confirmation') }}</p>
        @endif
    </div>

    <button type="submit" name="register">登録</button>
</form>            				
@endsection