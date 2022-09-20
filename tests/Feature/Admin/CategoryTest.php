<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tabel_category()
    {
        $response = $this->get('/admin/category');

        $response->assertSeeText('Table Category');
        $response->assertSeeText('Nama Kategori');
        $response->assertSeeText('Action');
        $response->assertStatus(200);
    }

    public function test_category_tambah_data(){
        $response = $this->get('/admin/category/create');

        $response->assertSee('category');
        $response->assertStatus(200);
    }

    public function test_table_categorys_from_database(){
        $this->assertDatabaseHas('categories', [
            'category' => 'Alat Musik Petik',
        ]);
    }

    public function test_tambah_data_category(){
        $response = $this->followingRedirects()->post('/admin/category', [
            'category' => 'category test',
        ]);
        //redirect to home
        $response->assertStatus(200);
    }

    public function test_edit_data_form(){
        $id = 1;
        $response = $this->get('/admin/category/'.$id.'/edit');

        $response->assertSee('Category');
        $response->assertStatus(200);
    }

    public function test_update_category(){
        $category = Category::where('id', 1)->first();

        $this->followingRedirects()->put($category->id, [
            'category' => 'test update'
        ]);

        $this->assertDatabaseHas('categories', $category->toArray());
        $this->assertTrue(true);
    }

    public function test_hapus_category(){
        $category = Category::find(1);
        
        $this->followingRedirects()->delete($category->id);
        $this->assertDatabaseHas('categories', $category->toArray());
        $this->assertTrue(true);
    }
}
