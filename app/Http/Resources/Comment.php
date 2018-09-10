<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;


class Comment extends Resource
{

    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'           => $this->id,
            'article_id'   => $this->article_id,
            'author_id'    => $this->author_id,
            'comment_text' => $this->comment_text,
        ];
    }

}

