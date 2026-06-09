<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller {
    public function showArticle($id) {
        //インスタンス生成
        $Articlemodel = new Article();
        $article = $Articlemodel->getArticle($id);
        return view('user/article',['article' => $article]);
    }
}
