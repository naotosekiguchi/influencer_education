<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model {
    public function getArticle($id) {
        //お知らせ情報抽出
        $article = DB::table('articles')
            ->where('articles.id', $id)
            ->select('id','title','article_contents','posted_date')      
            ->first();       
        return $article;
    }

    public function getArticleList() {
        //管理者向けお知らせリスト抽出
        $articleList = DB::table('articles')
            ->select('id','title','posted_date')      
            ->get();       
        return $articleList;
    }

    public function deleteArticle($id) {
        //お知らせ削除
        DB::table('articles')->where('id', $id)->delete();
    }

    public function renewArticle($id, $data) {
        //お知らせ変更
        DB::table('articles')->where('id', $id)->update([
            'title' => $data->title,
            'posted_date' => $data->posted_date,
            'article_contents' => $data->article_contents,
        ]);
    }

}
