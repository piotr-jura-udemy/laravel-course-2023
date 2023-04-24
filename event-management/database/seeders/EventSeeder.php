<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        for ($i = 0; $i < 200; $i++) {
            $user = $users->random();
            \App\Models\Event::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}