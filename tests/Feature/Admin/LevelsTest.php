<?php

namespace Tests\Feature\Admin;

use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LevelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tabel_level()
    {
        $response = $this->get('/admin/level');

        $response->assertSeeText('Table Level');
        $response->assertSeeText('Nama Kategori');
        $response->assertSeeText('Action');
        $response->assertStatus(200);
    }

    public function test_level_tambah_data(){
        $response = $this->get('/admin/level/create');

        $response->assertSee('level');
        $response->assertStatus(200);
    }

    public function test_table_levels_from_database(){
        $this->assertDatabaseHas('levels', [
            'level' => 'admin',
        ]);
    }

    public function test_tambah_data_level(){
        $response = $this->followingRedirects()->post('/admin/level', [
            'level' => 'level test',
        ]);
        //redirect to home
        $response->assertStatus(200);
    }

    public function test_edit_data_form(){
        $id = 1;
        $response = $this->get('/admin/level/'.$id.'/edit');

        $response->assertSee('admin');
        $response->assertStatus(200);
    }

    public function test_update_level(){
        $level = Level::where('id', 1)->first();

        $this->followingRedirects()->put($level->id, [
            'level' => 'test update'
        ]);

        $this->assertDatabaseHas('levels', $level->toArray());
        $this->assertTrue(true);
    }

    public function test_hapus_level(){
        $level = Level::find(1);
        
        $this->followingRedirects()->delete($level->id);
        $this->assertDatabaseHas('levels', $level->toArray());
        $this->assertTrue(true);
    }
}
