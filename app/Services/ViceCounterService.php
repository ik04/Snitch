<?php

namespace App\Services;

use App\Models\ViceCounter;

class ViceCounterService{
    public function initCounter($viceId){
        $counter =  ViceCounter::create([
         "vice_id" => $viceId
         ]);
         return $counter;
     }
     public function incrementCounterCount(ViceCounter $counter){
 
     }
     public function getCounterStats($id){
 
     }
}