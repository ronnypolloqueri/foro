<?php

class PostModelTest extends TestCase
{
    public function test_agregando_un_titulo_generado_como_un_slug()
    {
        $post = new \App\Post([
            'title' => 'Como instalar Laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);
    }

    public function test_editando_el_titulo_cambia_el_slug()
    {
        $post = new \App\Post([
            'title' => 'Como instalar Laravel'
        ]);

        $post->title = 'Como instalar Laravel 5.1 LTS';

        $this->assertSame('como-instalar-laravel-51-lts', $post->slug);
    }
}
