<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_id' => 4,
                'name' => 'Test product 1',
                'price' => 1000,
                'info' => 'It\'s a product of buyer1'
            ],
            [
                'user_id' => 5,
                'name' => 'Test product 2',
                'price' => 2000,
                'info' => 'It\'s a product of buyer2'
            ],
            [
                'user_id' => 6,
                'name' => 'Test product 3',
                'price' => 1020,
                'info' => 'It\'s a product of buyer3'
            ],
            [
                'user_id' => 2,
                'name' => 'Test Product 4',
                'price' => 10,
                'info' => 'It\'s a product of teamlead1'
            ],
            [
                'user_id' => 3,
                'name' => 'Test Product 5',
                'price' => 100,
                'info' => 'It\'s a product of teamlead2'
            ],
            [
                'user_id' => 1,
                'name' => 'Test Product 6',
                'price' => 1000,
                'info' => 'It\'s a product of admin'
            ]
        ];
        foreach($products as $product) {
            Product::create($product);
        }
    }
}
