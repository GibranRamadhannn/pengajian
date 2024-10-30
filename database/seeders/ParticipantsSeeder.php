<?php

namespace Database\Seeders;

use App\Models\Participants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Participants::factory()->count(75)->create();  
    }
}
