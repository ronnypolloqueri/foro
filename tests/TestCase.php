<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     *
     * @var \App\User
     */
    protected $defaultUser;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function defaultUser(array $attributes = [])
    {
        if ($this->defaultUser){
            return  $this->defaultUser;
        }
        return $this->defaultUser = factory(\App\User::class)->create($attributes);
    }

    public function createPost(array $attributes = [], $num_items = 1)
    {   
        return factory(\App\Post::class, $num_items)->create($attributes);
    }

    public function countElements($selector, $number)
    {
        $this->assertCount($number, $this->crawler->filter($selector));
        return $this;
    }
}
