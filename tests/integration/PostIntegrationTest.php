<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    function test_un_slug_es_generado_y_guardado_en_la_base_de_datos()
    {
        $post = factory(\App\Post::class)->create([
            'title' => 'Como instalar Laravel',
        ]);

        // fresh(), traera una instancia fresca de la bd
        $this->assertSame(
            'como-instalar-laravel', 
            $post->fresh()->slug
        );

        /*
        // Otra forma de verficar esto
        $this->seeInDatabase('posts', [
            'slug' => 'como-instalar-laravel',
        ]);
         */
    }
}
