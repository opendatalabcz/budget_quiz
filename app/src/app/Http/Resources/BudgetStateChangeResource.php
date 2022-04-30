<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BudgetStateChangeResource extends JsonResource
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
            'is_increase' => $this->is_increase,
            'is_expense' => $this->is_expense,
            'first_year' => $this->first_year,
            'second_year' => $this->second_year,
            'third_year' => $this->third_year,
            'budget_chapter' => new BudgetChapterResource($this->budgetChapter)
        ];
    }
}
