<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tags; // 追加
use App\Models\User; // 追加

class tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //追加
        $names = ['PHP', 'Laravel', 'Ruby', 'Rails', 'Python', 'Django'];

        foreach ($names as $name) {
            $randomUserId = User::inRandomOrder()->first()->id;
            tags::create([
                'name' => $name,
                'user_id' => $randomUserId, // 追加
            ]);
        }
    }
}
