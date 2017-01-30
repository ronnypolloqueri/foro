<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends FeatureTestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    function test_basic_example()
    {
        $username = "Ronny PA";

        $user = factory(\App\User::class)->create([
                'name'  => $username,
                'email' => 'ron@gmail.com',
        ]);

        $this->actingAs($user, 'api')
             ->visit('api/user')
             ->see($username)
             ->see('ron@gmail.com');
    }
}
