<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Question2;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Question2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test User 1',
            'email' => 'test@test.com',
            'password' => Hash::make('12345678')
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test@cmaisonneuve.qc.ca',
            'password' => Hash::make('12345678')
        ]);
    }
}
