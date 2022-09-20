<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $data = [
            ['level' => 'admin'],
            ['level' => 'user'],
          
        ];

        foreach($data as $item){
            Level::create([
                'level' => $item['level']
            ]);
        }

    }
}
