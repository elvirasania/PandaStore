<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_table_users()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'bintang@gmail.com'
        ]);
    }

    public function test_login_page()
    {
        $response = $this->get('/login');
        
        $response->assertSeeText('SIGN IN');
        $response->assertSeeText('Email');
        $response->assertSeeText('Password');
        $response->assertStatus(200);
    }

    public function test_user_must_fill_valid_email_address()
    {
        $response = $this->followingRedirects()->post('/login', [
            'email' => '',            
            'password' => '12345678',
        ]);

        $response->assertStatus(200);
    }
}
