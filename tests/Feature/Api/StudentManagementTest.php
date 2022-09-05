<?php

namespace Tests\Feature\Api;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    private String $token, $path;

    use RefreshDatabase;

    public function setUp() : void
    {
        User::factory(1)->create();
        Tutor::factory(3)->create();
        $this->path = 'api/v1/students';
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::first();
        $response = $this->postJson('api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
            'device' => 'Any device'
        ]);

        $response->assertOk();

        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
