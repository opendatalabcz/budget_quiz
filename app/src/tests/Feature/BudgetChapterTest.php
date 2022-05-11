<?php

namespace Tests\Feature;

use App\Models\BudgetChapter;
use Tests\AdminTestCase;

/**
 * Test budget chapter
 */
class BudgetChapterTest extends AdminTestCase
{
    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/budget_chapters', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_name', 'budget_chapter_number']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_only_name()
    {
        $response = $this->post('/admin/budget_chapters', [
            'budget_chapter_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_number']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_only_number()
    {
        $response = $this->post('/admin/budget_chapters', [
            'budget_chapter_number' => 42
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_name']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_non_numeric_number()
    {
        $response = $this->post('/admin/budget_chapters', [
            'budget_chapter_number' => 'abcd',
            'budget_chapter_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_number']);
    }

    /**
     * Test that budget chapter is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/budget_chapters', [
            'budget_chapter_number' => 42,
            'budget_chapter_name' => 'Test'
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
        $budgetChapter = new BudgetChapter();
        $budgetChapter->number = 1;
        $budgetChapter->name = 'test';
        $budgetChapter->save();

        $response = $this->put('/admin/budget_chapters/'.$budgetChapter->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_name', 'budget_chapter_number']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_only_name()
    {
        $budgetChapter = new BudgetChapter();
        $budgetChapter->number = 1;
        $budgetChapter->name = 'test';
        $budgetChapter->save();

        $response = $this->put('/admin/budget_chapters/'.$budgetChapter->id, [
            'budget_chapter_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_number']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_only_number()
    {
        $budgetChapter = new BudgetChapter();
        $budgetChapter->number = 1;
        $budgetChapter->name = 'test';
        $budgetChapter->save();

        $response = $this->put('/admin/budget_chapters/'.$budgetChapter->id, [
            'budget_chapter_number' => 42
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_name']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_non_numeric_number()
    {
        $budgetChapter = new BudgetChapter();
        $budgetChapter->number = 1;
        $budgetChapter->name = 'test';
        $budgetChapter->save();

        $response = $this->put('/admin/budget_chapters/'.$budgetChapter->id, [
            'budget_chapter_number' => 'abcd',
            'budget_chapter_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['budget_chapter_number']);
    }

    /**
     * Test that answer is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $budgetChapter = new BudgetChapter();
        $budgetChapter->number = 1;
        $budgetChapter->name = 'test';
        $budgetChapter->save();

        $response = $this->put('/admin/budget_chapters/'.$budgetChapter->id, [
            'budget_chapter_number' => 42,
            'budget_chapter_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that the controller deletes budget chapter
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $budgetChapter = new BudgetChapter();
        $budgetChapter->number = 1;
        $budgetChapter->name = 'test';
        $budgetChapter->save();

        $response = $this->delete('/admin/budget_chapters/'.$budgetChapter->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
