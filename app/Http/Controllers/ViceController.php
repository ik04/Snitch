<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateViceRequest;
use App\Services\ViceService;
use Illuminate\Http\Request;

class ViceController extends Controller
{
    public function __construct(protected ViceService $service)
    {
        
    }
    public function index(){
        $vices = $this->service->getVices();

        return view("vices",["vices"=>$vices]);
    }
    public function store(CreateViceRequest $request){
        $validated = $request->validated();
        $vice = $this->service->addVice($validated["name"],$validated["daily_limit"]);
        return redirect()->route('vices')->with('success','Vice Added Successfully');
    }
   
    
}
