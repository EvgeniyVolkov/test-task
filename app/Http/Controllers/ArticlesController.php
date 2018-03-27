<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest('published_at')->get();
        $commentsQty = DB::table('comments')
            ->select(DB::raw('article_id, count(*) as commentsQty'))
            ->groupBy('article_id')
            ->get();

        return view('articles.index', compact('articles', 'commentsQty'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = Comment::where('article_id', $id)->latest('added_on')->get();

        return view('articles.show', compact('article', 'comments'));
    }

}