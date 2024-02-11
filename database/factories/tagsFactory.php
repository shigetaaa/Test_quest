<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tags>
 */
class tagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = [
            'algorithm', 'backend', 'cache', 'database', 'encryption',
            'frontend', 'gateway', 'hypervisor', 'interface', 'json',
            'kernel', 'lambda', 'middleware', 'node', 'object',
            'protocol', 'query', 'runtime', 'stack', 'token'
        ];


        return [
            'name' => $this->faker->randomElement($names),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
