<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Rate as RateResource;
use App\Rate as RateModel;


class RateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => []
        ]);
    }

    public function set(Request $request, $articleId)
    {
        if (!$rate = RateModel::where('article_id', $articleId)->where('author_id', auth()->user()->getAttribute('id'))->first()) {
            $rate = new RateModel;
        }
        $rate->article_id = $articleId;
        $rate->author_id = auth()->user()->getAttribute('id');
        $rate->rate = $request->input('rate');
        if ($rate->save()) {
            return new RateResource($rate);
        }
    }

    public function remove($articleId)
    {
        $rate = RateModel::where('article_id', $articleId)->where('author_id', auth()->user()->getAttribute('id'))->first();
        if ($rate->delete()) {
            return response()->json(['message' => 'Your rate has been removed.']);
        }
    }

}

