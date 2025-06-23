<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Nike Air Max',
            'description' => 'Comfortable running shoes',
            'price' => 129.99,
            'image' => null, // or a path like 'products/nike-air.jpg'
        ]);

        Product::create([
            'name' => 'Adidas Superstar',
            'description' => 'Classic streetwear sneaker',
            'price' => 89.99,
            'image' => null,
        ]);
    }
}
