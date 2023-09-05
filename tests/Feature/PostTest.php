<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_post()
    {
        $post = Post::factory()->create([
            'title' => 'Test Post',
            'body' => 'This is a test post.',
        ]);

        $this->assertEquals('Test Post', $post->title);
        $this->assertEquals('This is a test post.', $post->body);
    }

}
