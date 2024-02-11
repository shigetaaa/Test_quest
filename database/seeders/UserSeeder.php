<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // 追加

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ここから追加
        $names = ['yamada', 'suzuki', 'tanaka'];

        foreach ($names as $name) {
            User::create([
                'name' => $name,
                'email' => $name . '@example.com',
                'password' => bcrypt('xxx')
            ]);
        }
        //ここまで追加
    }
}
