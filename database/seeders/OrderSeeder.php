<?php

namespace Database\Seeders;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
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
                'order_date' => Carbon::now(),
                'total' => 350000,
                'status' => 'paid',
            ],

            [
                'user_id' => 2,
                'order_date' => Carbon::now(),
                'total' => 3000000,
                'status' => 'unpaid',
            ],
          
        ];

        $no = 1;
        foreach($data as $item){
            Order::create([
                'id' => 'ORD-00'.$no++, //id akan otomatis
                'user_id' => $item['user_id'],
                'order_date' => $item['order_date'],
                'total' => $item['total'],
                'status' => $item['status'],
            ]);
        }
    }
}
