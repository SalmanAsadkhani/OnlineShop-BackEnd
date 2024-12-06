<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->url_image != null ?  $url_image  = env( "APP_URL").'/'.$this->url_image : $url_image = null;
        return [
            'id'=> $this->id,
            'slug'=> $this->slug,
            'peice'=>$this->price,
            'description'=> $this->description,
            'url_image'=>$this->url_image,

        ];
    }
}
