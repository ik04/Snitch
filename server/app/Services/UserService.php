<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{
    public function store(string $name,string $email, string $password){
        $user = User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password)
        ]);
        return $user;
    }
    public function authenticateUser($valdiatedData){
        return auth()->attempt($valdiatedData);
    }
    public function logout(){           
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

}