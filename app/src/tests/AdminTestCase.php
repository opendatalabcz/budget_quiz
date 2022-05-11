<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Base for tests for administration
 */
abstract class AdminTestCase extends TestCase
{
    use RefreshDatabase;

    /** @var User holds the logged-in user */
    protected User $user;

    /**
     * Create user and impersonate him for the requests
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = new User();
        $this->user->username = 'testing user';
        $this->user->password = 'test';
        $this->user->save();
        $this->actingAs($this->user);
    }
}
