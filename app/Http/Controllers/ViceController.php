<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateViceRequest;
use Illuminate\Http\Request;

class ViceController extends Controller
{
    public function store(CreateViceRequest $request){
        $validated = $request->validated();
        

    }
}
