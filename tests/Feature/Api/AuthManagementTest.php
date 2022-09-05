<?php

namespace Tests\Feature\Api;

use App\Models\User;
use AssertionError;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthManagementTest extends TestCase
{
    private $auth, $path;

    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();
        User::factory(1)->create();
        $this->path = '/api/v1/login';
    }

    public function test_must_return_a_bad_response_when_send_an_invalid_email_in_login_form()
    {
        $request = [
            'password' => '1234',
            'device' => 'Device'
        ];

        // Email required
        $response = $this->postJson($this->path, $request);
        $response->assertStatus(422);
        $response->assertJson(function(AssertableJson $json) {
            $json->hasAll(['message', 'errors', 'errors.email']);
            $json->where('errors.email.0', 'The email field is required.');
        });

        // Email string and valid email
        $request['email'] = 123;
        $response = $this->postJson($this->path, $request);
        $response->assertJson(function(AssertableJson $json) {
            $json->whereAll([
                'errors.email.0' => 'The email must be a string.',
                'errors.email.1' => 'The email must be a valid email address.'
            ])->etc();
        });
    }

    /** @test */
    public function test_the_login_must_be_invalid_with_wrong_credentials()
    {
        $response = $this->postJson($this->path, [
            'email' => 'abc@example.com',
            'password' => '1234',
            'device' => 'Cualquier'
        ]);

        $response->assertStatus(401);
        $response->assertJson(function(AssertableJson $json) {
            $json->has('error');
        });
    }

    /** @test */
    public function test_must_return_the_user_data_when_send_a_valid_data()
    {
        Artisan::call('passport:install');
        $this->auth = User::first();
        
        $response = $this->postJson($this->path, [
            'email' => $this->auth->email,
            'password' => 'password',
            'device' => 'Windows 10'
        ]);

        $response->assertOk();
        $response->assertJson(function(AssertableJson $json) {
            
            $json->hasAll(['user', 'user.id', 'user.name', 'user.email', 'access_token']);

            $json->whereAllType([
                'user.id' => 'integer',
                'user.name' => 'string',
                'user.email' => 'string',
                'access_token' => 'string'
            ])->etc();

            $json->whereAll([
                'user.id' => $this->auth->id,
                'user.name' => $this->auth->name,
                'user.email' => $this->auth->email,
            ])->etc();
        });
    }
}
