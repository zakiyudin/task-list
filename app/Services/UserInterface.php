<?php

namespace App\Services;

interface UserInterface 
{
    public function login(string $username, string $password);
}