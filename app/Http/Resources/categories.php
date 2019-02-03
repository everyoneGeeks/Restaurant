<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class categories extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "icon"=>$this->icon,
            'food'=>food::collection($this->food),
        ];
    }
}
