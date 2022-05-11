<?php

namespace Tests\Feature;

use App\Models\BudgetChapter;
use App\Models\BudgetState;
use Tests\AdminTestCase;

/**
 * Test the initial budget state
 */
class BudgetStateTest extends AdminTestCase
{

    /** @var BudgetChapter for which this budget state is tested */
    protected BudgetChapter $budgetChapter;

    /**
     * Build dependencies
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->budgetChapter = new BudgetChapter();
        $this->budgetChapter->number = 1;
        $this->budgetChapter->name = 'Test';
        $this->budgetChapter->save();
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_income_first_year',
                                           'budget_state_income_second_year',
                                           'budget_state_income_third_year',
                                           'budget_state_expense_first_year',
                                           'budget_state_expense_second_year',
                                           'budget_state_expense_third_year']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_non_numeric()
    {
        $response = $this->post('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state', [
            'budget_state_income_first_year' => 'abcd',
            'budget_state_income_second_year' => 'abcd',
            'budget_state_income_third_year' => 'abcd',
            'budget_state_expense_first_year' => 'abcd',
            'budget_state_expense_second_year' => 'abcd',
            'budget_state_expense_third_year' => 'abcd'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_income_first_year',
                                           'budget_state_income_second_year',
                                           'budget_state_income_third_year',
                                           'budget_state_expense_first_year',
                                           'budget_state_expense_second_year',
                                           'budget_state_expense_third_year']);
    }

    /**
     * Test that budget state is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state', [
            'budget_state_income_first_year' => 42,
            'budget_state_income_second_year' => 42,
            'budget_state_income_third_year' => 42,
            'budget_state_expense_first_year' => 42,
            'budget_state_expense_second_year' => 42,
            'budget_state_expense_third_year' => 42
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_data()
    {
        $budgetState = new BudgetState();
        $budgetState->income_first_year = 42;
        $budgetState->income_second_year = 42;
        $budgetState->income_third_year = 42;
        $budgetState->expense_first_year = 42;
        $budgetState->expense_second_year = 42;
        $budgetState->expense_third_year = 42;
        $budgetState->budget_chapter_id = $this->budgetChapter->id;
        $budgetState->save();

        $response = $this->put('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state/'.$budgetState->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_income_first_year',
                                           'budget_state_income_second_year',
                                           'budget_state_income_third_year',
                                           'budget_state_expense_first_year',
                                           'budget_state_expense_second_year',
                                           'budget_state_expense_third_year']);
    }


    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_non_numeric()
    {
        $budgetState = new BudgetState();
        $budgetState->income_first_year = 42;
        $budgetState->income_second_year = 42;
        $budgetState->income_third_year = 42;
        $budgetState->expense_first_year = 42;
        $budgetState->expense_second_year = 42;
        $budgetState->expense_third_year = 42;
        $budgetState->budget_chapter_id = $this->budgetChapter->id;
        $budgetState->save();

        $response = $this->put('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state/'.$budgetState->id, [
            'budget_state_income_first_year' => 'abcd',
            'budget_state_income_second_year' => 'abcd',
            'budget_state_income_third_year' => 'abcd',
            'budget_state_expense_first_year' => 'abcd',
            'budget_state_expense_second_year' => 'abcd',
            'budget_state_expense_third_year' => 'abcd'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_income_first_year',
                                           'budget_state_income_second_year',
                                           'budget_state_income_third_year',
                                           'budget_state_expense_first_year',
                                           'budget_state_expense_second_year',
                                           'budget_state_expense_third_year']);
    }

    /**
     * Test that budget state is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $budgetState = new BudgetState();
        $budgetState->income_first_year = 42;
        $budgetState->income_second_year = 42;
        $budgetState->income_third_year = 42;
        $budgetState->expense_first_year = 42;
        $budgetState->expense_second_year = 42;
        $budgetState->expense_third_year = 42;
        $budgetState->budget_chapter_id = $this->budgetChapter->id;
        $budgetState->save();

        $response = $this->put('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state/'.$budgetState->id, [
            'budget_state_income_first_year' => 11,
            'budget_state_income_second_year' => 11,
            'budget_state_income_third_year' => 11,
            'budget_state_expense_first_year' => 11,
            'budget_state_expense_second_year' => 11,
            'budget_state_expense_third_year' => 11
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that budget state can be viewed
     *
     * @return void
     */
    public function test_show()
    {
        $budgetState = new BudgetState();
        $budgetState->income_first_year = 42;
        $budgetState->income_second_year = 42;
        $budgetState->income_third_year = 42;
        $budgetState->expense_first_year = 42;
        $budgetState->expense_second_year = 42;
        $budgetState->expense_third_year = 42;
        $budgetState->budget_chapter_id = $this->budgetChapter->id;
        $budgetState->save();

        $response = $this->get('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state/'.$budgetState->id);

        $response->assertStatus(200);
    }

    /**
     * Test that the controller deletes budget state
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $budgetState = new BudgetState();
        $budgetState->income_first_year = 42;
        $budgetState->income_second_year = 42;
        $budgetState->income_third_year = 42;
        $budgetState->expense_first_year = 42;
        $budgetState->expense_second_year = 42;
        $budgetState->expense_third_year = 42;
        $budgetState->budget_chapter_id = $this->budgetChapter->id;
        $budgetState->save();

        $response = $this->delete('/admin/budget_chapters/'.$this->budgetChapter->id.'/budget_state/'.$budgetState->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
