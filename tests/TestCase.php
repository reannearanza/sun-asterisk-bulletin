<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;
    
    /** @var User */
    protected $testingUser;

    public function setUp(): void
    {
        parent::setUp();

        $this->testingUser = User::factory()->make([
            'id'               => 1,
            'name'             => 'Sun Asterisk',
            'username'         => 'sun_asterisk',
        ]);

        $this->actingAs($this->testingUser);
    }
}
