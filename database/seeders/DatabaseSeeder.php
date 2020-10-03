<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a admin user for the system
        $user = User::factory()->make();
        $user->email = "admin@example.com";
        $user->save();

        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
    }
}
