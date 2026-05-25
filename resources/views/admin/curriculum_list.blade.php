@extends('layouts.app')

@section('title', '授業一覧ページ')

@section('styles')
    <link href="{{ asset('css/curriculum_list_blade.css') }}" rel="stylesheet">
@endsection

@section('content')

    @csrf
    <div>
        <button type="submit" id="curriculum_edit">授業管理</button>
        <button type="submit" id="article">お知らせ管理</button>
        <button type="submit" id="banner">バナー管理</button>
        <a href="{{ route('logout') }}" class="logout">ログアウト</a>
    </div>

    <div class="box"> 
        <div>
            <a href="{{ route('logout') }}">← 戻る</a>
            <h1>授業一覧</h1>

            <!-- 新規登録ボタン -->
            <a href="{{ route('logout') }}">新規登録</a> <p>選択中の学年（仮）</p>
        </div>
      
        <div class="TablE">
            <table >
                <thead>
                    <tr>
                        <th>＊＊</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!--@section('scripts')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script> 
    <script src="{{ asset('js/list.js') }}"></script> 
    <script>

    </script>
    @endsection-->

@endsection