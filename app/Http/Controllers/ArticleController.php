<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use App\Article as ArticleModel;


class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => ['index', 'show']
        ]);
    }

    public function index()
    {
        $articles = ArticleModel::paginate(25);
        return ArticleResource::collection($articles);
    }

    public function store(Request $request)
    {
        if (auth()->user()->getAttribute('is_admin')) {
            $article = new ArticleModel;
            $article->author_id = auth()->user()->getAttribute('id');
            $article->title = $request->input('article_title');
            $article->content = $request->input('article_content');
            if ($article->save()) {
                return new ArticleResource($article);
            }
        }
        return response()->json(['message' => 'Only the blog owner can do this.']);
    }

    public function show($id)
    {
        $article = ArticleModel::findOrFail($id);
        return new ArticleResource($article);
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->getAttribute('is_admin')) {
            $article = ArticleModel::findOrFail($id);
//            $article->author_id = auth()->user()->getAttribute('id');
            $article->title = $request->input('article_title');
            $article->content = $request->input('article_content');
            if ($article->save()) {
                return new ArticleResource($article);
            }
        }
        return response()->json(['message' => 'Only the blog owner can do this.']);
    }

    public function destroy($id)
    {
        if (auth()->user()->getAttribute('is_admin')) {
            $article = ArticleModel::findOrFail($id);
            if ($article->delete()) {
                return new ArticleResource($article);
            }
        }
        return response()->json(['message' => 'Only the blog owner can do this.']);
    }

}

