<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
         $p = Product::create([
            'name' => 'Sample Product',
            'description' => 'This is a sample product description.',
            'price' => 19.99,
            
        ]);
        $p->save();

      /*  User::factory()->create([
            'username' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
