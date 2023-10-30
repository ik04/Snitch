<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(protected UserService $service)
    {
        
    }
    public function store(UserRegisterRequest $request){
        $validated = $request->validated();
        $user = $this->service->store($validated["name"],$validated["email"],$validated["password"]);
        return redirect()->route('landing')->with('success','Registered successfully!');
    }
    public function login(UserLoginRequest $request){
        $validated = $request->validated();
        $authenticated = $this->service->authenticateUser($validated);
        if($authenticated){
            return redirect()->route('home')->with('success','Logged in successfully!');
        }else{
            return redirect()->route('login.show')->withErrors(["email"=>"invalid email or password"]);
        }
    }
    public function logout(){
        $this->service->logout();
        return redirect()->route('landing')->with('success',"Logged out");
    }
}
