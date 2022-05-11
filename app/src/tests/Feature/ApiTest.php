<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Test the API
 */
class ApiTest extends TestCase
{
    /**
     * Test that there are available data from API
     *
     * @return void
     */
    public function test_get_data()
    {
        $response = $this->get('/api/quiz/data');

        $response->assertStatus(200);
    }
}
