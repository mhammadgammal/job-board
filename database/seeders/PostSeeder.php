<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Get all users or create them if they don't exist
        // $users = User::all();

        // if ($users->isEmpty()) {
        //     $users = User::factory(5)->create();
        // }

        // Create 10 posts, each assigned to a random user
        Post::factory(10)->create(['user_id' => 5]);
    }
}
