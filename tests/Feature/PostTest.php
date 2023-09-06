<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    public function test_can_create_post()
    {
        $post = Post::factory()->create([
            'title' => 'Test Post',
            'body' => 'This is a test post.',
        ]);

        $this->assertEquals('Test Post', $post->title);
        $this->assertEquals('This is a test post.', $post->body);
    }


    public function testPostUpdate()
    {
        $post = Post::factory()->create();
        $newData = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];

        $response = $this->put(route('posts.update', $post), $newData);

        $response->assertStatus(302); 
        dd($post->fresh()->toArray()); 
        dd($response->content()); 

        $this->assertDatabaseHas('posts', $newData); 
    }

}
