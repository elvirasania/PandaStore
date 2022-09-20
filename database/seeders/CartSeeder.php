<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;


class CartSeeder extends Seeder
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
                'user_id' => 2,
                'product_id' => 1,
                'price' => 350000,
                'qty' => 1,
                'subtotal' => 350000
            ],
            
            [
                'user_id' => 2,
                'product_id' => 2,
                'price' => 1500000,
                'qty' => 2,
                'subtotal' => 3000000
            ],

            [
                'user_id' => 2,
                'product_id' => 3,
                'price' => 12000000,
                'qty' => 1,
                'subtotal' => 12000000
            ],
          
        ];

        foreach($data as $item){
            Cart::create([
                'user_id' => $item['user_id'],
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['subtotal']
            ]);
        }
    }
}
