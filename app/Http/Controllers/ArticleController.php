<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Database\Eloquent\Builder; # 模型用的
// \Illuminate\Database\Query\Builder::  DB用的
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // 关键词
        $title = $request->get('title');
        # 搜索条件
        $data = Article::when($title,function(Builder $query) use($title){
            $query->where('title','like',"%{$title}%");
        })->paginate(env('PAGESIZE'));
        // dump($data);
        return view('article.index',compact('data'));
    }


}
