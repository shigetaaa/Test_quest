<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articles_tags>
 */
class articles_tagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = \App\Models\User::inRandomOrder()->first();

        $blog = \App\Models\Blog::where('user_id', $user->id)->inRandomOrder()->first();
        $tag = \App\Models\tags::where('user_id', $user->id)->inRandomOrder()->first();

        return [
            'blog_id' => $blog->id,
            'tag_id' => $tag->id,
        ];
    }
}
