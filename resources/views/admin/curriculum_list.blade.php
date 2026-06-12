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
        
        <div class="curriculum_content">

            <div class="grade_type">
                <button type="submit" class="pschool" data-id=>小学校2年生</button>
                <button type="submit" class="pschool">小学校3年生</button>
                <button type="submit" class="pschool">小学校4年生</button>
                <button type="submit" class="pschool">小学校5年生</button>
                <button type="submit" class="pschool">小学校6年生</button>
                <button type="submit" class="jhschool">中学校1年生</button>
                <button type="submit" class="jhschool">中学校2年生</button>
                <button type="submit" class="jhschool">中学校3年生</button>
                <button type="submit" class="hschool">高校1年生</button>
                <button type="submit" class="hschool">高校2年生</button>
                <button type="submit" class="hschool">高校3年生</button>

                <!-- ＠foreach ( as )　各学年がはいる
                    <div>
                        <p></p>
                    </div>
                ＠endforeach -->
            </div>
        
            <div class="curriculum_article">
                <div class="article_cell">
                    <p>AA</p>
                    <p>AA</p>
                    <button type="submit" class="edit_btn">授業内容編集</button>
                    <button type="submit" class="schedule_btn">配信日時編集</button>
                </div>

                <div class="article_cell">
                    <p>AA</p>
                    <p>AA</p>
                    <button type="submit" class="edit_btn">授業内容編集</button>
                    <button type="submit" class="schedule_btn">配信日時編集</button>
                </div>
                
                <div class="article_cell">
                    <p>AA</p>
                    <p>AA</p>
                    <button type="submit" class="edit_btn">授業内容編集</button>
                    <button type="submit" class="schedule_btn">配信日時編集</button>
                </div>

                <div class="article_cell">
                    <p>AA</p>
                    <p>AA</p>
                    <button type="submit" class="edit_btn">授業内容編集</button>
                    <button type="submit" class="schedule_btn">配信日時編集</button>
                </div>
            </div>

        </div>
    </div>


    <!--@section('scripts')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script> 
    <script src="{{ asset('js/list.js') }}"></script> 
    <script>

    </script>
    @endsection-->

@endsection