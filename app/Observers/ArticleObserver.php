<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    /**
     * 监听用户时间
     */
    public function creating(Article $art)
    {
        $art->ip =  request()->ip();
    }
}
