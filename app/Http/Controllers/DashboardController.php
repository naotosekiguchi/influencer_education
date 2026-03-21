<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 全バナーを取得
        $banners = Banner::all();

        // お知らせをposted_dateの新しい順に5件取得
        $articles = Article::orderBy('posted_date', 'desc')
                            ->take(5)
                            ->get();

        return view('dashboard', compact('banners', 'articles'));
    }
}