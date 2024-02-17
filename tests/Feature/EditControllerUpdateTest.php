<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use App\Models\tags;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditControllerUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function testEdit()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('blogs.edit', $blog));

        $response->assertStatus(200)
            ->assertViewIs('edit')
            ->assertViewHas('blog', $blog);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->create(['user_id' => $user->id]);
        $tag = tags::factory()->create(['user_id' => $user->id]);

        $data = [
            'title' => 'Updated Title',
            'content' => 'Updated Content',
            'tags' => $tag->name,
        ];

        $response = $this->actingAs($user)->put(route('blogs.update', $blog), $data);

        $response->assertRedirect(route('blogs.show', $blog))
            ->assertSessionHas('success', 'Blog updated successfully');

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated Title',
            'content' => 'Updated Content',
        ]);

        $this->assertDatabaseHas('tags', [
            'name' => $tag->name,
            'user_id' => $user->id,
        ]);
    }
}
