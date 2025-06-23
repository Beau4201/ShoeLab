<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\User::where('email', 'test@example.com')->delete();
        User::factory()->create([
    'name' => 'Test User',
    'username' => 'testuser',
    'email' => 'test@example.com',
    'phone' => '0612345678',
    'adress' => 'Straatnaam 123',
    'postal' => '1234AB',
    'password' => Hash::make('password123'),
]);

 $this->call(ProductSeeder::class);
    }
}
