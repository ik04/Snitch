<?php

namespace App\Services;

use App\Models\Need;
use Ramsey\Uuid\Uuid;

class NeedService{
    public function addNeed(string $name, int|float $dailyLimit){
        $need = Need::create([
            "name" => $name,
            "daily_limit" => $dailyLimit,
            "uuid" => Uuid::uuid4()
        ]);
        $needCounterService = new NeedCounterService;
        $needCounterService->initCounter($need["id"]);
        return $need;
    }
    public function getNeeds(){
        $needs = Need::select("name","daily_limit")->get();
        return $needs;
    }
    public function updateNeed(int|float $dailyLimit,Need $need){
        $need->update([
            'daily_limit' => $dailyLimit,
        ]);
        return $need;
    }
    public function deleteNeed(Need $need){
        $need->delete();
    }
}