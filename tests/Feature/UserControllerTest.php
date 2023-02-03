<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->get('/login')
            ->assertSeeText('LOGIN');
    }

    public function loginSuccess()
    {
        $this->post('doLogin', [
            "user" => "kamil",
            "password" => "12345"
        ])->assertRedirect('/')
            ->assertSessionHas("user", "kamil");
    }

    public function loginFailed()
    {
        $this->post('doLogin', [])
            ->assertSeeText("User or Password is required");
    }

    public function loginWrong()
    {
        $this->post('doLogin', [
            "user" => "adas",
            "password" => "kajksdjk"
        ])->assertRedirect('/')
            ->assertSessionHas("user", "kamil");
    }
}
