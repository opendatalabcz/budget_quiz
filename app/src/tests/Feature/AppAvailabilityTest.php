<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Test App availability of some pages
 */
class AppAvailabilityTest extends TestCase
{
    /**
     * Test that homepage can be accessed
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test that quiz can be accessed
     *
     * @return void
     */
    public function test_quiz()
    {
        $response = $this->get('/quiz');

        $response->assertStatus(200);
    }

    /**
     * Test that results can be accessed
     *
     * @return void
     */
    public function test_results()
    {
        $response = $this->get('/results');

        $response->assertStatus(200);
    }
}
