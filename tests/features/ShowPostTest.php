<?php

class ShowPostTest extends FeatureTestCase
{
    function test_un_usuario_puede_ver_los_detalles_del_post()
    {
        // Having 
        $user = $this->defaultUser([
            'name' => 'Ronny PA',
        ]);

        $post = factory(\App\Post::class)->create([
            'title'   => 'Este es el título del post',
            'content' => 'Este es el contenido',
            'user_id' => $user->id,
        ]);

        // When
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see('Ronny PA');

    }

    function test_las_viejas_urls_redirigiran_a_las_nuevas()
    {
        // Having 
        $post = factory(\App\Post::class)->create([
            'title' => 'Old title',
        ]);

        $old_url = $post->url;

        $post->update(['title' => 'New Title']);

        $this->visit($old_url)
            ->assertResponseOk() // Sin ningun error 404, 500, etc 
            ->seePageIs($post->url);
    }

}
