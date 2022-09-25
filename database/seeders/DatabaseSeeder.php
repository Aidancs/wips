<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'User One',
             'email' => 'one@one.com',
         ]);

         User::factory()->create([
             'name' => 'User Two',
             'email' => 'two@two.com',
         ]);
    }
}
