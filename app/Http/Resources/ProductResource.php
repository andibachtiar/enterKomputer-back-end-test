<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $model = [
            "id" => $this->id,
            "name" => $this->name,
            "category" => $this->category->name,
        ];

        if($this->price !== null) {
            $model["price"] = $this->price;
        }

        if($this->variants !== null) {
            $model["variants"] = $this->variants;
        }

        return ($model);
    }
}
