<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function only_logged_in_users_can_access_settings(){
        $response =$this->get('/settings')
            ->assertRedirect('/login');
    }
    /** @test */
    public function user_register_through_signup_form(){
        $this->withoutExceptionHandling();
        $response = $this->post('/signup', $this->getData());
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function name_is_required_in_signup_form(){
        $response = $this->post('/signup', array_merge($this->getData(), ['name'=>'']));
        $response->assertSessionHasErrors('name');
        $this->assertCount(0, User::all());
    }
    /** @test */
    public function password_is_at_least_8_characters(){
        $response = $this->post('/signup', array_merge($this->getData(), ['password'=>'123', 'confirm_password' => '123']));
        $response->assertSessionHasErrors('password');
        $this->assertCount(0, User::all());
    }
    public function getData(){
        return [
            'name' => 'achraf',
            'email'=>'test@email.com',
            'address' => 'test',
            'city' => 'Rades',
            'zip' => '4080',
            'tel' => '222222',
            'pass' => '369852147A&',
            'confirm_password' => '369852147A&'
        ];
    }
}
