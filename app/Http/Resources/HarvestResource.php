<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HarvestResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'commodity_name' => $this->commodity_name,
            'quantity_kg'      => $this->quantity_kg,
            'harvest_date'   => $this->harvest_date,
            'created_at'     => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}