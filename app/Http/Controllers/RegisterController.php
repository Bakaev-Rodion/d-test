<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegisterPage(){
        $teams = Team::where('name', '!=', 'Admin team')->get();
        return view('register', ['teams' => $teams]);
    }

    public function register(RegisterRequest $request){
        if(!$request->team_id){
            Team::create(['name' => $request->team_name]);
            User::create(array_merge($request->validated(), ['team_id'=>Team::where('name', $request->team_name)->value('id')]));
        }
        else {
            User::create($request->validated());
        }
        return redirect('/');
    }
}
