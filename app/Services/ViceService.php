<?php

namespace App\Services;

use App\Models\User;
use App\Models\Vice;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class ViceService{
    public function addVice(string $name, int|float $dailyLimit){
        $vice = Vice::create([
            "name" => $name,
            "daily_limit" => $dailyLimit,
            "uuid" => Uuid::uuid4()
        ]);
        return $vice;
    }
    public function getVices(){
        $vices = Vice::select("name","daily_limit")->get();
        return $vices;
    }
   

}