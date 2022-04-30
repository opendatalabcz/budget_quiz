<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BudgetChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'name' => $this->name
        ];
    }
}
