<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateViceRequest;
use App\Http\Requests\UpdateViceRequest;
use App\Models\Vice;
use App\Services\ViceService;
use Exception;
use Illuminate\Http\Request;

class ViceController extends Controller
{
    public function __construct(protected ViceService $service)
    {
        
    }
    public function index(){
        try{
            $vices = $this->service->getVices();
            return view("vices",["vices"=>$vices]);
        }catch(Exception $e){
            return redirect()->route('vices')->with('error', 'Error updating vice: ' . $e->getMessage());
        }
    }
    public function store(CreateViceRequest $request){
        try{
            $validated = $request->validated();
            $vice = $this->service->addVice($validated["name"],$validated["daily_limit"]);
            return redirect()->route('vices')->with('success','Vice Added Successfully');
        }catch( Exception $e){
            return redirect()->route('vices')->with('error', 'Error adding vice: ' . $e->getMessage());
        }
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
    public function deleteVice(Vice $uuid){
        $this->service->deleteVice($uuid);
        return redirect()->route('vices')->with('vice deleted.');

    }
    // todo: drop confetti when needs are met
    
   
    
}
