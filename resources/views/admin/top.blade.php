@extends('admin.layouts.app')

@section('styles')
    @vite('resources/css/admin_top.css')
@endsection

@section('content')

<div class="page-wrapper">

    <div class="admin-info-box">

        <div class="admin-info-row">
            <span>ユーザーネーム :&nbsp;</span>
            <span>{{ Auth::guard('admin')->user()->name }}</span>
        </div>

        <div class="admin-info-row">
            <span>メールアドレス :&nbsp;</span>
            <span>{{ Auth::guard('admin')->user()->email }}</span>
        </div>
    </div>
</div>

@endsection
