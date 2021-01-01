<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */
    public function only_logged_in_users_can_access_settings(){
        $response =$this->get('/settings')
            ->assertStatus(404);
    }
}
