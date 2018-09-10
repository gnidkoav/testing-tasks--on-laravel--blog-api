<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;


class Article extends Resource
{

    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'        => $this->id,
            'author_id' => $this->author_id,
            'title'     => $this->title,
            'content'   => $this->content,
        ];
    }

}

