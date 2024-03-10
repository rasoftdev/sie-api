<?php

namespace App\Http\Resources;

use App\Http\Utils\TraductionPermissions;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
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
            'name_es' => TraductionPermissions::getTranslatedPermissions($this->name),
            'category' => $this->category,
            'category_es' => TraductionPermissions::getTranslatedModules($this->category),
        ];
    }
}
