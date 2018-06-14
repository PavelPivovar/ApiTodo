<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_post_method_and_status()
    {
        $data = [
            'title' => 'title',
            'body' => 'body'
        ];
         $this->json('POST','api/task', $data)
             ->assertStatus(201);
        
    }
}
