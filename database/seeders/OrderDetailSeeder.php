<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
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
                'order_id' => 'ORD-001',
                'product_id' => 1,
                'price' => 350000,
                'qty' => 1,
                'subtotal' => 350000,
            ],

            [
                'order_id' => 'ORD-002',
                'product_id' => 2,
                'price' => 1500000,
                'qty' => 2,
                'subtotal' => 3000000,
            ],
          
        ];

        foreach($data as $item){
            OrderDetail::create([
                'order_id' => $item['order_id'],
                'product_id' => $item['product_id'],
                'price' => $item['price'],
                'qty' => $item['qty'],
                'subtotal' => $item['subtotal'],
            ]);
        }

    }
}
