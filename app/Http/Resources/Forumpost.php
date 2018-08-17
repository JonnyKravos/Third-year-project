<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Forumpost extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publication_id' => $this->publication_id,
            'body' => $this->body];
    }

    public function with($request)
    {
        return [
            'api:' => 'This is my attempt at making forumposts an api'
        ];
    }
}
