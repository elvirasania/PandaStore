<?php

namespace Tests\Feature\Admin;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tabel_order()
    {
        $response = $this->get('/admin/order');

        $response->assertSeeText('Table Order');
        $response->assertSeeText('Id');
        $response->assertSeeText('User id');
        $response->assertSeeText('Order Date');
        $response->assertSeeText('Total');
        $response->assertSeeText('Status');
        $response->assertSeeText('Action');
        $response->assertStatus(200);
    }

    public function test_order_tambah_data(){
        $response = $this->get('/admin/order/create');

        $response->assertSee('order');
        $response->assertStatus(200);
    }

    public function test_table_order_from_database(){
        $this->assertDatabaseHas('orders', [
            'id' => 'INV1655554359',
        ]);
    }

    public function test_tambah_data_order(){
        $response = $this->followingRedirects()->post('/admin/order', [
            'order' => 'order test',
        ]);
        //redirect to home
        $response->assertStatus(200);
    }
}
