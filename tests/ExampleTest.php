<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
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
