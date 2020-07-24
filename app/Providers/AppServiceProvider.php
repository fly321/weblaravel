<?php

namespace App\Providers;

use App\Models\Article;
use App\Observers\ArticleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 如果Article 模型有添加的动作，则执行此观察者对应的事件方法
        Article::observe(ArticleObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
