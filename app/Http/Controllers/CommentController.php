<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Comment as CommentResource;
use App\Comment as CommentModel;


class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => ['getByArticle']
        ]);
    }

    public function getByArticle($articleId)
    {
        $comments = CommentModel::where('article_id', $articleId)->paginate(25);
        return CommentResource::collection($comments);
    }

    public function addByArticle(Request $request, $articleId)
    {
        $comment = new CommentModel;
        $comment->article_id = $articleId;
        $comment->author_id = auth()->user()->getAttribute('id');
        $comment->comment_text = $request->input('comment_text');
        if ($comment->save()) {
            return new CommentResource($comment);
        }
    }

}

