<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class food extends JsonResource
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
            "image"=>$this->image,
            'description'=>$this->description,
            "price"=>$this->price,
            "is_discount"=>$this->discount,
            "discount"=>$this->discount,
        ];
    }
}
