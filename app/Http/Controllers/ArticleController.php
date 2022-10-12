<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::query()
            ->limit(5)
                ->get()
                ;
        return view('article.random', compact('articles'));

    }

}
