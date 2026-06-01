<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Article::create([
                'title' => 'お知らせタイトル例 ' . $i,
                'posted_date' => Carbon::now()->subDays($i),
                'article_contents' => 'ここに記事の本文が入ります。設計書通りのlongText形式で保存されます。',
            ]);
        }
    }
}