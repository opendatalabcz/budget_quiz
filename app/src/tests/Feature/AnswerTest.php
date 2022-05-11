<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Answer;
use Tests\AdminTestCase;

/**
 * Test the answers
 */
class AnswerTest extends AdminTestCase
{

    /** @var Question for which this answer is tested */
    protected Question $question;

    /**
     * Set up required dependencies for these tests
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
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['answer_title', 'answer_description']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_title()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers', [
            'answer_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['answer_title']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_description()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers', [
            'answer_title' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['answer_description']);
    }

    /**
     * Test that answer is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/questions/'.$this->question->id.'/answers', [
            'answer_title' => 'Test',
            'answer_description' => 'Testing'
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
        $answer = new Answer();
        $answer->title = 'Test';
        $answer->description = 'Testing';
        $answer->question_id = $this->question->id;
        $answer->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$answer->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['answer_title', 'answer_description']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_title()
    {
        $answer = new Answer();
        $answer->title = 'Test';
        $answer->description = 'Testing';
        $answer->question_id = $this->question->id;
        $answer->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$answer->id, [
            'answer_description' => 'Testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['answer_title']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_no_description()
    {
        $answer = new Answer();
        $answer->title = 'Test';
        $answer->description = 'Testing';
        $answer->question_id = $this->question->id;
        $answer->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$answer->id, [
            'answer_title' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['answer_description']);
    }

    /**
     * Test that answer is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $answer = new Answer();
        $answer->title = 'Test';
        $answer->description = 'Testing';
        $answer->question_id = $this->question->id;
        $answer->save();

        $response = $this->put('/admin/questions/'.$this->question->id.'/answers/'.$answer->id, [
            'answer_title' => 'test',
            'answer_description' => 'testing'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that answer can be shown
     *
     * @return void
     */
    public function test_show()
    {
        $answer = new Answer();
        $answer->title = 'Test';
        $answer->description = 'Testing';
        $answer->question_id = $this->question->id;
        $answer->save();

        $response = $this->get('/admin/questions/'.$this->question->id.'/answers/'.$answer->id);

        $response->assertStatus(200);
    }

    /**
     * Test that the controller deletes an answer
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $answer = new Answer();
        $answer->title = 'Test';
        $answer->description = 'Testing';
        $answer->question_id = $this->question->id;
        $answer->save();

        $response = $this->delete('/admin/questions/'.$this->question->id.'/answers/'.$answer->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
