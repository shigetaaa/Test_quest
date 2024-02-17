<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditControllerCreateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    // 新規記事の作成画面が表示されるかのテスト
    public function testCreate()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('blogs.create'));

        $response->assertStatus(200);
        $response->assertViewIs('post.create');
    }

    // 新規記事が保存できるかのテスト
    public function testStore()
    {
        $user = User::factory()->create();
        $postData = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'subject' => $this->faker->sentence,
            'tags' => 'tag1,tag2,tag3',
        ];

        $response = $this->actingAs($user)->post(route('blogs.store'), $postData);

        $response->assertRedirect(route('blogs.index'));
        $this->assertDatabaseHas('blogs', [
            'title' => $postData['title'],
            'content' => $postData['content'],
            'subject' => $postData['subject'],
            'user_id' => $user->id,
        ]);
        $this->assertDatabaseHas('tags', ['name' => 'tag1', 'user_id' => $user->id]);
        $this->assertDatabaseHas('tags', ['name' => 'tag2', 'user_id' => $user->id]);
        $this->assertDatabaseHas('tags', ['name' => 'tag3', 'user_id' => $user->id]);
    }
}
