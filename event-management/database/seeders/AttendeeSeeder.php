<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $events = \App\Models\Event::all();

        foreach ($users as $user) {
            $eventsToAttend = $events->random(rand(1, 3));

            foreach ($eventsToAttend as $event) {
                \App\Models\Attendee::create([
                    'user_id' => $user->id,
                    'event_id' => $event->id
                ]);
            }
        }
    }
}