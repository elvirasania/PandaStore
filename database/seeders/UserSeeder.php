<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Bintang',
                'email' => 'bintang@gmail.com',
                'password' => Hash::make('password'),
                'address' => 'Trenggalek',
                'phone_number' => '081293345432',
                'gender' => 'L',
                'level_id' => 1
            ],

            [
                'name' => 'Aqua',
                'email' => 'aqua@gmail.com',
                'password' => Hash::make('aqua'),
                'address' => 'Malang',
                'phone_number' => '082231123321',
                'gender' => 'P',
                'level_id' => 2
            ],
          
        ];

        foreach($data as $item){
            User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => $item['password'],
                'address' => $item['address'],
                'gender' => $item['gender'],
                'level_id' => $item['level_id'],
                'image' => null,
            ]);
        }

       
    }
}
