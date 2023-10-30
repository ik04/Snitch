<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateViceRequest;
use App\Http\Requests\UpdateViceRequest;
use App\Models\Vice;
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
    public function update(UpdateViceRequest $request, Vice $uuid)
    {
        try {
            $validated = $request->validated();
            $this->service->updateVice($validated["daily_limit"], $uuid);
    
            return redirect()->route('vices')->with('success', 'Vice Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('vices')->with('error', 'Error updating vice: ' . $e->getMessage());
        }
    }
    
   
    
}
