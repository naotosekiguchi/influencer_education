<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller {
    public function showArticleList() {
        //お知らせ一覧画面表示
        //インスタンス生成
        $Articlesmodel = new Article();
        $articles = $Articlesmodel->getArticleList();
        return view('admin/article_list',['articles' => $articles]);
    }

    public function deleteArticle($id) {
        //お知らせ削除機能
        DB::beginTransaction();
        try {
            //インスタンス生成
            $Articlesmodel = new Article();
            //お知らせ削除
            $Articlesmodel->deleteArticle($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
        
        //リダイレクト
        return redirect(route('admin.show.article.list'));
    }

    public function showArticleEdit($id) {
        //管理者用お知らせ変更画面表示
        $Articlemodel = new Article();
        $article = $Articlemodel->getArticle($id);
        return view('admin/article_edit',['article' => $article]);
    }

    public function submitArticleEdit(ArticleRequest $request ,$id) {
        //管理者用お知らせ変更機能
        DB::beginTransaction();
        try {
            $Articlemodel = new Article();
            $Articlemodel->renewArticle($id, $request);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        //アラート表示
        session()->flash('article_edit_message', '登録しました。');
        
        //お知らせ一覧画面に推移
        $articles = $Articlemodel->getArticleList();
        return view('admin/article_list',['articles' => $articles]);
    }

    
    //お知らせ新規登録画面表示
    public function showArticleCreate() {
        return view('admin/article_create');
    }

}
