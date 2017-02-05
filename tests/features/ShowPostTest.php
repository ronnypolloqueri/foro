<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostTest extends TestCase
{
    public function test_un_usuario_puede_ver_los_detalles_del_post()
    {
        $user = $this->defaultUser([
            'name' => 'Ronny PA',
        ]);

        // Having 
        $post = factory(\App\Post::class)->make([
        
            'title' => 'Este es el título del post',
            'content' => 'Este es el contenido del post',
        ]);

        $user->posts()->save($post);

        // When
        $this->visit(route('posts.show', $post))
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);

    }
}
