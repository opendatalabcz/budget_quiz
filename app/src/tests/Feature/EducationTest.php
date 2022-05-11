<?php

namespace Tests\Feature;

use App\Models\Education;
use Tests\AdminTestCase;

/**
 * Test the educations
 */
class EducationTest extends AdminTestCase
{
    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/educations', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['education_name']);
    }

    /**
     * Test that education is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/educations', [
            'education_name' => 'Test'
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
        $education = new Education();
        $education->name = 'test';
        $education->save();

        $response = $this->put('/admin/educations/'.$education->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['education_name']);
    }


    /**
     * Test that education is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $education = new Education();
        $education->name = 'test';
        $education->save();

        $response = $this->put('/admin/educations/'.$education->id, [
            'education_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that the controller deletes an education
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $education = new Education();
        $education->name = 'test';
        $education->save();

        $response = $this->delete('/admin/educations/'.$education->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
