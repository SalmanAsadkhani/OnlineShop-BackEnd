<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class ProductResource extends JsonResource
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
            'price'=>$this->price,
            'description'=> $this->description,
            'url_image'=>$this->url_image,
            'category_id' => $this->Category->name,

        ];
    }
}
