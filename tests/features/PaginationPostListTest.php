<?php

use \Carbon\Carbon;

class PaginationPostListTest extends FeatureTestCase
{
    public function test_los_post_estan_paginados()
    {
        $first = factory(\App\Post::class)->create([
            'title' => 'Post más antiguo',
            'created_at' => Carbon::now()->subDays(2),
        ]);

        /* $posts = $this->createPost([], 15); */
        factory(\App\Post::class)->times(15)->create([
            'created_at' => Carbon::now()->subDay(),
        ]);

        $last = factory(\App\Post::class)->create([
            'title' => 'Post más reciente',
            'created_at' => Carbon::now(),
        ]);

        $this->visit('/')
            ->seeInElement('h1', 'Posts')
            ->see($last->title)
            ->dontSee($first->title)
            ->click('2') // voy a la 2da pagina
            ->see($first->title)
            ->dontSee($last->title);
            /* ->countElements('ul#posts li', 10); */

    }
}
