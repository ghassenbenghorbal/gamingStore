<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
class SignUpTest extends TestCase
{
    use RefreshDatabase;

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
        $this->assertCount(0, User::all());
    }
    /** @test */
    public function confirm_password_must_match_password(){
        $response = $this->post('/signup', array_merge($this->getData(), ['confirm_password' => '369852147B&']));
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
