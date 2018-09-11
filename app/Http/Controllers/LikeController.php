<?php

namespace App\Http\Controllers;

use App\Like as LikeModel;


class LikeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => []
        ]);
    }

    public function toggle($articleId)
    {
        if ($like = LikeModel::where('article_id', $articleId)->where('author_id', auth()->user()->getAttribute('id'))->first()) {
            if ($like->delete()) {
                return response()->json(['message' => 'Your like has been removed.']);
            }
        }
        $like = new LikeModel;
        $like->article_id = $articleId;
        $like->author_id = auth()->user()->getAttribute('id');
        if ($like->save()) {
            return response()->json(['message' => 'Your like has been set.']);
        }
    }

}

