<?php

namespace Tests\Feature\Api;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class StudentManagementTest extends TestCase
{
    private String $token, $path;

    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        Artisan::call('passport:install');
        User::factory(1)->create();
        Tutor::factory(1)->create();
        $this->path = 'api/v1/students';
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function test_must_create_a_new_student()
    {
        $user = User::first();
        $tutor = Tutor::first();

        $response = $this->actingAs($user, 'api')
        ->postJson($this->path, [
            'name' => 'Pablo',
            'lastname' => 'Larios',
            'tutor_id' => $tutor->id
        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'lastname',
                'tutor' => ['id']
            ]
        ]);

        $response->assertJson(function(AssertableJson $json) use($tutor) {
            
            $json->whereAllType([
                'data.id' => 'integer',
                'data.name' => 'string',
                'data.lastname' => 'string',
                'data.tutor.id' => 'integer',
            ])->etc();

            $json->whereAll([
                'data.name' => 'Pablo',
                'data.lastname' => 'Larios',
                'data.tutor.id' => $tutor->id
            ])->etc();

        });
    }

    /** @test */
    public function test_must_be_invalid_the_form_where_is_incomplete_post()
    {
        $user = User::first();
        $tutor = Tutor::first();

        $response = $this->actingAs($user, 'api')
        ->postJson($this->path, [
            'lastname' => 'Larios',
            'tutor_id' => $tutor->id
        ]);

        $response->assertStatus(422);
        $response->assertInvalid(['name']);
    }
}
