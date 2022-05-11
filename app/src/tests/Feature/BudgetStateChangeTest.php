<?php

namespace Tests\Feature;

use App\Models\Answer;
use App\Models\BudgetChapter;
use App\Models\Question;
use App\Models\BudgetStateChange;
use Tests\AdminTestCase;

class BudgetStateChangeTest extends AdminTestCase
{

    /** @var Question for which the is attached to */
    protected Question $question;

    /** @var Answer for which this budget state change is tested */
    protected Answer $answer;

    /** @var BudgetChapter for which this budget state is tested */
    protected BudgetChapter $budgetChapter;

    /**
     * Build necessary dependencies for tests
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->question = new Question();
        $this->question->number = 40;
        $this->question->title = 'Test';
        $this->question->description = 'Testing';
        $this->question->save();

        $this->answer = new Answer();
        $this->answer->title = 'Test';
        $this->answer->description = 'Testing';
        $this->answer->question_id = $this->question->id;
        $this->answer->save();

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
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_change_chapter_id',
                                           'budget_state_change_income_first_year',
                                           'budget_state_change_income_second_year',
                                           'budget_state_change_income_third_year',
                                           'budget_state_change_expense_first_year',
                                           'budget_state_change_expense_second_year',
                                           'budget_state_change_expense_third_year']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_non_numeric()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change', [
            'budget_state_change_chapter_id' => $this->budgetChapter->id,
            'budget_state_change_income_first_year' => 'abcd',
            'budget_state_change_income_second_year' => 'abcd',
            'budget_state_change_income_third_year' => 'abcd',
            'budget_state_change_expense_first_year' => 'abcd',
            'budget_state_change_expense_second_year' => 'abcd',
            'budget_state_change_expense_third_year' => 'abcd'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_change_income_first_year',
                                           'budget_state_change_income_second_year',
                                           'budget_state_change_income_third_year',
                                           'budget_state_change_expense_first_year',
                                           'budget_state_change_expense_second_year',
                                           'budget_state_change_expense_third_year']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_budget_chapter()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change', [
            'budget_state_change_income_first_year' => 42,
            'budget_state_change_income_second_year' => 42,
            'budget_state_change_income_third_year' => 42,
            'budget_state_change_expense_first_year' => 42,
            'budget_state_change_expense_second_year' => 42,
            'budget_state_change_expense_third_year' => 42
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_change_chapter_id']);
    }

    /**
     * Test that budget state change is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change', [
            'budget_state_change_chapter_id' => $this->budgetChapter->id,
            'budget_state_change_income_first_year' => 42,
            'budget_state_change_income_second_year' => 42,
            'budget_state_change_income_third_year' => 42,
            'budget_state_change_expense_first_year' => 42,
            'budget_state_change_expense_second_year' => 42,
            'budget_state_change_expense_third_year' => 42
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
        $budgetStateChange = new BudgetStateChange();
        $budgetStateChange->income_first_year = 42;
        $budgetStateChange->income_second_year = 42;
        $budgetStateChange->income_third_year = 42;
        $budgetStateChange->expense_first_year = 42;
        $budgetStateChange->expense_second_year = 42;
        $budgetStateChange->expense_third_year = 42;
        $budgetStateChange->budget_chapter_id = $this->budgetChapter->id;
        $budgetStateChange->answer_id = $this->answer->id;
        $budgetStateChange->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change/'.$budgetStateChange->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_change_chapter_id',
                                           'budget_state_change_income_first_year',
                                           'budget_state_change_income_second_year',
                                           'budget_state_change_income_third_year',
                                           'budget_state_change_expense_first_year',
                                           'budget_state_change_expense_second_year',
                                           'budget_state_change_expense_third_year']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_non_numeric()
    {
        $budgetStateChange = new BudgetStateChange();
        $budgetStateChange->income_first_year = 42;
        $budgetStateChange->income_second_year = 42;
        $budgetStateChange->income_third_year = 42;
        $budgetStateChange->expense_first_year = 42;
        $budgetStateChange->expense_second_year = 42;
        $budgetStateChange->expense_third_year = 42;
        $budgetStateChange->budget_chapter_id = $this->budgetChapter->id;
        $budgetStateChange->answer_id = $this->answer->id;
        $budgetStateChange->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change/'.$budgetStateChange->id, [
            'budget_state_change_chapter_id' => $this->budgetChapter->id,
            'budget_state_change_income_first_year' => 'abcd',
            'budget_state_change_income_second_year' => 'abcd',
            'budget_state_change_income_third_year' => 'abcd',
            'budget_state_change_expense_first_year' => 'abcd',
            'budget_state_change_expense_second_year' => 'abcd',
            'budget_state_change_expense_third_year' => 'abcd'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_change_income_first_year',
                                           'budget_state_change_income_second_year',
                                           'budget_state_change_income_third_year',
                                           'budget_state_change_expense_first_year',
                                           'budget_state_change_expense_second_year',
                                           'budget_state_change_expense_third_year']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_budget_chapter()
    {
        $budgetStateChange = new BudgetStateChange();
        $budgetStateChange->income_first_year = 42;
        $budgetStateChange->income_second_year = 42;
        $budgetStateChange->income_third_year = 42;
        $budgetStateChange->expense_first_year = 42;
        $budgetStateChange->expense_second_year = 42;
        $budgetStateChange->expense_third_year = 42;
        $budgetStateChange->budget_chapter_id = $this->budgetChapter->id;
        $budgetStateChange->answer_id = $this->answer->id;
        $budgetStateChange->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change/'.$budgetStateChange->id, [
            'budget_state_change_income_first_year' => 42,
            'budget_state_change_income_second_year' => 42,
            'budget_state_change_income_third_year' => 42,
            'budget_state_change_expense_first_year' => 42,
            'budget_state_change_expense_second_year' => 42,
            'budget_state_change_expense_third_year' => 42
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_state_change_chapter_id']);
    }

    /**
     * Test that answer is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $budgetStateChange = new BudgetStateChange();
        $budgetStateChange->income_first_year = 1;
        $budgetStateChange->income_second_year = 1;
        $budgetStateChange->income_third_year = 1;
        $budgetStateChange->expense_first_year = 1;
        $budgetStateChange->expense_second_year = 1;
        $budgetStateChange->expense_third_year = 1;
        $budgetStateChange->budget_chapter_id = $this->budgetChapter->id;
        $budgetStateChange->answer_id = $this->answer->id;
        $budgetStateChange->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change/'.$budgetStateChange->id, [
            'budget_state_change_chapter_id' => $this->budgetChapter->id,
            'budget_state_change_income_first_year' => 42,
            'budget_state_change_income_second_year' => 42,
            'budget_state_change_income_third_year' => 42,
            'budget_state_change_expense_first_year' => 42,
            'budget_state_change_expense_second_year' => 42,
            'budget_state_change_expense_third_year' => 42
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that budget state change can be viewed
     *
     * @return void
     */
    public function test_show()
    {
        $budgetStateChange = new BudgetStateChange();
        $budgetStateChange->income_first_year = 42;
        $budgetStateChange->income_second_year = 42;
        $budgetStateChange->income_third_year = 42;
        $budgetStateChange->expense_first_year = 42;
        $budgetStateChange->expense_second_year = 42;
        $budgetStateChange->expense_third_year = 42;
        $budgetStateChange->budget_chapter_id = $this->budgetChapter->id;
        $budgetStateChange->answer_id = $this->answer->id;
        $budgetStateChange->save();

        $response = $this->get('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change/'.$budgetStateChange->id);

        $response->assertStatus(200);
    }

    /**
     * Test that the controller deletes budget state change
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $budgetStateChange = new BudgetStateChange();
        $budgetStateChange->income_first_year = 42;
        $budgetStateChange->income_second_year = 42;
        $budgetStateChange->income_third_year = 42;
        $budgetStateChange->expense_first_year = 42;
        $budgetStateChange->expense_second_year = 42;
        $budgetStateChange->expense_third_year = 42;
        $budgetStateChange->budget_chapter_id = $this->budgetChapter->id;
        $budgetStateChange->answer_id = $this->answer->id;
        $budgetStateChange->save();

        $response = $this->delete('/admin/questions/'.$this->question->id.'/answers/'.$this->answer->id.'/budget_state_change/'.$budgetStateChange->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
