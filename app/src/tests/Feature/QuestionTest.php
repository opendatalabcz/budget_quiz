<?php

namespace Tests\Feature;

use App\Models\Question;
use Tests\AdminTestCase;

/**
 * Test questions
 */
class QuestionTest extends AdminTestCase
{
    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/questions', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_number', 'question_title', 'question_description']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_number()
    {
        $response = $this->post('/admin/questions', [
            'question_title' => 'Test',
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_number']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_title()
    {
        $response = $this->post('/admin/questions', [
            'question_number' => 42,
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_title']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_description()
    {
        $response = $this->post('/admin/questions', [
            'question_number' => 42,
            'question_title' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_description']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_non_numeric_number()
    {
        $response = $this->post('/admin/questions', [
            'question_number' => 'abcd',
            'question_title' => 'Test',
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_number']);
    }

    /**
     * Test that question is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/questions', [
            'question_number' => 42,
            'question_title' => 'Test',
            'question_description' => 'Testing'
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
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->put('/admin/questions/'.$question->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_number', 'question_title', 'question_description']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_number()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->put('/admin/questions/'.$question->id, [
            'question_title' => 'Test',
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_number']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_title()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->put('/admin/questions/'.$question->id, [
            'question_number' => 42,
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_title']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_description()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->put('/admin/questions/'.$question->id, [
            'question_number' => 42,
            'question_title' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_description']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_non_numeric_number()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->put('/admin/questions/'.$question->id, [
            'question_number' => 'abcd',
            'question_title' => 'Test',
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['question_number']);
    }

    /**
     * Test that question is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->put('/admin/questions/'.$question->id, [
            'question_number' => 42,
            'question_title' => 'Test',
            'question_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
    /**
     * Test that question can be shown
     *
     * @return void
     */
    public function test_show()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->get('/admin/questions/'.$question->id);

        $response->assertStatus(200);
    }

    /**
     * Test that the controller deletes question
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $question = new Question();
        $question->number = 1;
        $question->title = 'test';
        $question->description = 'testing';
        $question->save();

        $response = $this->delete('/admin/questions/'.$question->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
