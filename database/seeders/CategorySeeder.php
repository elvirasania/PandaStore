<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category' => 'Alat Musik Petik'],
            ['category' => 'Alat Musik Pukul'],
            ['category' => 'Alat Musik Tiup'],
        ];


        foreach($data as $item){
            Category::create([
                'category' => $item['category']
            ]);
        }

    }
}
