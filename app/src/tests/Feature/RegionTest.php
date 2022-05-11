<?php

namespace Tests\Feature;

use App\Models\Region;
use Tests\AdminTestCase;

/**
 * Test the regions
 */
class RegionTest extends AdminTestCase
{
    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/regions', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['region_name']);
    }

    /**
     * Test that region is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/regions', [
            'region_name' => 'Test'
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
        $region = new Region();
        $region->name = 'test';
        $region->save();

        $response = $this->put('/admin/regions/'.$region->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['region_name']);
    }


    /**
     * Test that region is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $region = new Region();
        $region->name = 'test';
        $region->save();

        $response = $this->put('/admin/regions/'.$region->id, [
            'region_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that the controller deletes an entity
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $region = new Region();
        $region->name = 'test';
        $region->save();

        $response = $this->delete('/admin/regions/'.$region->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
