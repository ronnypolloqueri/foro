<?php

class ShowPostTest extends FeatureTestCase
{
    function test_un_usuario_puede_ver_los_detalles_del_post()
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
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);

    }

    function test_las_viejas_urls_redirigiran_a_las_nuevas()
    {
        $user = $this->defaultUser();

        // Having 
        $post = factory(\App\Post::class)->make([
            'title' => 'Old title',
        ]);

        $user->posts()->save($post);

        $old_url = $post->url;

        $post->update(['title' => 'New Title']);

        $this->visit($old_url)
            ->assertResponseOk() // Sin ningun error 404, 500, etc 
            ->seePageIs($post->url);
    }

}
