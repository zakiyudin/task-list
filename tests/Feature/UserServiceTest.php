<?php

namespace Tests\Feature;

use App\Services\UserInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    public $userInterface;

    protected function setUp():void
    {
        parent::setUp();

        $this->userInterface = $this->app->make(UserInterface::class);
    }

    public function testSample()
    {
        self::assertTrue(true);
    }

    public function testLoginSuccess()
    {
        self::assertTrue($this->userInterface->login("kamil", "12345"));
    }

    public function testLoginFailed()
    {
        self::assertFalse($this->userInterface->login("ahaha", "haha"));
    }

    public function wrongPassword()
    {
        self::assertFalse($this->userInterface->login("kamil", "haha"));
    }
}
