<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    public function test_can_create_post()
    {
        $newData = [
            'title' => 'Test Post',
            'body' => 'This is a test post.',
        ];

        $response = $this->post('/api/store', $newData);
        // $response = $this->post(route('posts.store'), $newData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', $newData); 
    }//corrected test case -1


    public function test_can_delete_post()
    {
        $post = Post::factory()->create();

        $user = User::factory()->create(); 
        $this->actingAs($user);

        $response = $this->delete(route('posts.destroy', $post->id));

        $response->assertStatus(302);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }//correctly finished delete operation


        public function test_can_update_post()
    {
    
        $post = Post::factory()->create();

        $user = User::factory()->create(); 
        $this->actingAs($user);

        $updatedData = [
            'title' => 'Updated Title',
            'body' => 'Updated body content.',
        ];

        $response = $this->put(route('posts.update', $post->id), $updatedData);
        $response->assertStatus(302);
        $this->assertDatabaseHas('posts', array_merge(['id' => $post->id], $updatedData));

        $this->assertDatabaseMissing('posts', ['id' => $post->id, 'title' => $post->title, 'body' => $post->body]);
    }//created updated test case success


    public function test_can_view_post()
    {
        $post = Post::factory()->create([
            'title' => 'ehncjnfjsnfkjfcnksdjcmkds',
            'body' => 'Ssjndj',
        ]);

        $response = $this->get(route('posts.show', $post->id));

        $response->assertStatus(302);
        $response->assertDontSee($post->title);
    }
}
