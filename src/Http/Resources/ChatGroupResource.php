<?php

namespace Fintech\Chat\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
