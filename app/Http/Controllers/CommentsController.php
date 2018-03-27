<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $this->validate($request, [
            'email' => 'required|email|min:6|max:50',
            'text' => 'required',
        ]);

        Comment::create($request->all());

        return redirect('articles/' . $articleId);
    }
}