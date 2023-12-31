<?php

namespace Fintech\Chat\Seeders;

use Fintech\Chat\Facades\Chat;
use Illuminate\Database\Seeder;

class ChatParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = $this->data();

        foreach (array_chunk($data, 200) as $block) {
            set_time_limit(2100);
            foreach ($block as $entry) {
                Chat::chatParticipant()->create($entry);
            }
        }
    }

    private function data()
    {
        return [];
    }
}
