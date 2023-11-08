<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNeedRequest;
use App\Http\Requests\UpdateNeedRequest;
use App\Models\Need;
use App\Services\NeedService;
use Exception;
use Illuminate\Http\Request;

class NeedController extends Controller
{
    public function __construct(protected NeedService $service)
    {
        
    }
    public function getNeeds(){
        $needs = Need::all();
        return response()->json(["needs" => $needs]);
    }
    public function store(CreateNeedRequest $request){
        try{
            $validated = $request->validated();
            $need = $this->service->addNeed($validated["name"],$validated["daily_limit"]);
            return response()->json(["message" => "need added success fully","need" => $need]);
        }catch( Exception $e){
            return redirect()->route('vices')->with('error', 'Error adding vice: ' . $e->getMessage());
        }
    }
    public function update(UpdateNeedRequest $request, Need $uuid)
    {
        try {
            $validated = $request->validated();
            $this->service->updateNeed($validated["daily_limit"], $uuid);
            return redirect()->route('vices')->with('success', 'Vice Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->route('vices')->with('error', 'Error updating vice: ' . $e->getMessage());
        }
    }
    public function deleteVice(Need $uuid){
        $this->service->deleteNeed($uuid);
        return redirect()->route('vices')->with('vice deleted.');

    }
}
