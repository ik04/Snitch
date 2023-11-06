<?php
namespace App\Services;

use App\Models\NeedCounter;

class NeedCounterService{
    public function initCounter($needId){
       $counter =  NeedCounter::create([
        "need_id" => $needId
        ]);
        return $counter;
    }
    public function incrementCounterCount(NeedCounter $counter){

    }
    public function getCounterStats($id){

    }
}