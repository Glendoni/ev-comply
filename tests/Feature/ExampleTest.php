<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ExampleTest extends TestCase
{
use withoutmiddleware, RefreshDatabase;
    public function setUp():void
    {
        parent::setUp();
     // $this->seed();
        User::factory()->count(5)->create();
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_email_update()
    {
        $response = $this->get('api/email');

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    function test_an_event_is_fired_when_a_user_is_updated(){

        $response = $this->get('api/emailupdate');
        $this->assertDatabaseCount('users',5);
    }
}
