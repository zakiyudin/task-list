<?php

namespace App\Services;

use App\Services\UserInterface;

class UserService implements UserInterface 
{
    private  $users = [
        "kamil" => "12345"
    ];
    public function login(string $username, string $password)
    {
        if(!isset($this->users[$username])){
            return false;
        }

        $correctPassword = $this->users[$username];
        if($password == $correctPassword){
            return true;
        }else{
            return false; 
        }
    }
}