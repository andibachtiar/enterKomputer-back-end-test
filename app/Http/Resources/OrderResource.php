<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "table" => $this->table->name,
            "total_price" => $this->total_price,
            "datetime" => Carbon::parse($this->created_at)->format("Y-m-d H:i"),
            "order_items" => $this->order_items,
        ];
    }
}
