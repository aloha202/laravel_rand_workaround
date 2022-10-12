<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::query()
            ->join(DB::raw("(SELECT id FROM articles  ORDER BY RAND() LIMIT 5) rnd"), function($join){
                $join->on('articles.id', '=', 'rnd.id');
            })
                    ->get()
                ;
        return view('article.random', compact('articles'));

    }

    public function index2()
    {
        $query = Article::query()
            ->join(DB::raw("(SELECT CEIL(RAND() * (SELECT MAX(id) FROM articles)) as id) rnd"), function($join){
                $join->on('articles.id', '>=', 'rnd.id');
            })
            ->limit(1)
            ;
        $query_to_clone = clone $query;
        for($i = 0; $i < 4; $i++)
        {
            $query_[$i] = clone $query_to_clone;
            $query->unionAll($query_[$i]);
        }

        $articles = $query->get()
        ;
        return view('article.random', compact('articles'));
    }

}
