<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Sun Asterisk',
            'username' => 'sun_asterisk',
            'password' => bcrypt('secret'),
        ]);

        User::factory()->create([
            'name' => 'Asterisk User',
            'username' => 'user_asterisk',
            'password' => bcrypt('secret'),
        ]);
    }
}
