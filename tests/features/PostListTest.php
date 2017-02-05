<?php

class PostListTest extends FeatureTestCase
{
    public function test_un_usuario_puede_ver_el_listado_del_posts_e_ir_al_detalle_de_post()
    {
        $post = $this->createPost([
            'title' => '¿Debo usar Laravel 5.3 o 5.1 LTS?'
        ]);

        $this->visit('/')
            ->seeInElement('h1', 'Posts')
            ->see($post->title)
            ->click($post->title)
            ->seePageIs($post->url);
    }
}
