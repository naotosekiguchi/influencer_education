@extends('layouts.app')

@section('title', '授業一覧ページ')

@section('styles')
    <link href="{{ asset('css/curriculum_list_blade.css') }}" rel="stylesheet">
@endsection

@section('content')

    @csrf
    <div class="header">
        <button type="submit" id="curriculum_edit">授業管理</button>
        <button type="submit" id="article">お知らせ管理</button>
        <button type="submit" id="banner">バナー管理</button>
        <a href="{{ route('logout') }}" class="logout">ログアウト</a>
    </div>

    <div class="box"> 
        <div>
            <a href="{{ route('logout') }}" class="modoru">← 戻る</a>
            <h1>授業一覧</h1>
        </div>

        <div>
            <!-- 新規登録ボタン -->
            <button type="submit" href="{{ route('logout') }}" class="create_btn">新規登録</button>
            <p class="grade">小学校〇年生
                <!-- ＠foreach ( as )　選択した学年がはいる
                <div>
                    <p></p>
                </div>
                ＠endforeach -->
            </p>
        </div>
        
        <div class="grade_type">
            <button type="submit"></button>
            <!-- ＠foreach ( as )　各学年がはいる
                <div>
                    <p></p>
                </div>
            ＠endforeach -->
        </div>
      
        <div class=>
            <p>＊＊</p>
        </div>
    </div>


    <!--@section('scripts')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script> 
    <script src="{{ asset('js/list.js') }}"></script> 
    <script>

    </script>
    @endsection-->

@endsection