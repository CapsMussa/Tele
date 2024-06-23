<?php

namespace App\Http\Resources\Product;

use App\Models\Type;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type_id' => $this->type_id,
            'equipment_type' => [
                'id' => $this->type->id,
                'name' => $this->type->name,
                'maskSN' => $this->type->maskSN,
            ],
            'serial_number' => $this->serial_number,
            'desc' => $this->desc
        ];
    }
}
