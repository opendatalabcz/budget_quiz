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
            'income_first_year' => $this->income_first_year,
            'income_second_year' => $this->income_second_year,
            'income_third_year' => $this->income_third_year,
            'expense_first_year' => $this->expense_first_year,
            'expense_second_year' => $this->expense_second_year,
            'expense_third_year' => $this->expense_third_year,
            'budget_chapter' => new BudgetChapterResource($this->budgetChapter)
        ];
    }
}
