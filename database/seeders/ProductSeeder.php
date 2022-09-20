<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Gitar Akustik',
                'category_id' => 1,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat fuga unde, pariatur explicabo   nobis eaque non error vel. Saepe fuga vel itaque ab numquam perspiciatis molestias placeat inventore sed nostrum.',
                'price' => 350000,
                'stock' => 50,
                'rating' => 4.9,
                
            ],

            [
                'name' => 'Drum',
                'category_id' => 2,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat fuga unde, pariatur explicabo nobis eaque non error vel. Saepe fuga vel itaque ab numquam perspiciatis molestias placeat inventore sed nostrum.',
                'price' => 1500000,
                'stock' => 50,
                'rating' => 4.9,
                
            ],

            [
                'name' => 'Saksofon',
                'category_id' => 3,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat fuga unde, pariatur explicabo nobis eaque non error vel. Saepe fuga vel itaque ab numquam perspiciatis molestias placeat inventore sed nostrum.',
                'price' => 12000000,
                'stock' => 50,
                'rating' => 4.9,
                
                
            ],
          
        ];

        foreach($data as $item){
            Product::create([
                'name' => $item['name'],
                'category_id' => $item['category_id'],
                'description' => $item['description'],
                'price' => $item['price'],
                'stock' => $item['stock'],
                'rating' => $item['rating'],
                'image' => null,
            ]);
        }
    }
}
