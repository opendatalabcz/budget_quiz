<?php

namespace Tests\Feature;

use App\Models\Party;
use Tests\AdminTestCase;

/**
 * Test the political parties
 */
class PartyTest extends AdminTestCase
{
    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_no_data()
    {
        $response = $this->post('/admin/parties', []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['party_name']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_creation_only_name_successful()
    {
        $response = $this->post('/admin/parties', [
            'party_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }


    /**
     * Test that party is created successfully
     *
     * @return void
     */
    public function test_creation_successful()
    {
        $response = $this->post('/admin/parties', [
            'party_short_name' => 'TST',
            'party_name' => 'Test'
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
        $party = new Party();
        $party->short_name = 'TST';
        $party->name = 'test';
        $party->save();

        $response = $this->put('/admin/parties/'.$party->id, []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['party_name']);
    }

    /**
     * Test that invalid data fails the validation
     *
     * @return void
     */
    public function test_edit_only_name_successful()
    {
        $party = new Party();
        $party->short_name = 'TST';
        $party->name = 'test';
        $party->save();

        $response = $this->put('/admin/parties/'.$party->id, [
            'party_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that party is edited successfully
     *
     * @return void
     */
    public function test_edit_successful()
    {
        $party = new Party();
        $party->short_name = 'TST';
        $party->name = 'test';
        $party->save();

        $response = $this->put('/admin/parties/'.$party->id, [
            'party_short_name' => 'tst',
            'party_name' => 'Test'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    /**
     * Test that the controller deletes party
     *
     * @return void
     */
    public function test_delete_successful()
    {
        $party = new Party();
        $party->short_name = 'TST';
        $party->name = 'test';
        $party->save();

        $response = $this->delete('/admin/parties/'.$party->id);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
