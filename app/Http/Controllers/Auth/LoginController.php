<?php

namespace App\Http\Controllers\Auth;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateLogin;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;


class LoginController extends Controller
{
  
  public function index(){
    return view("login.login");
  }

  public function store(ValidateLogin $request){
    try{
      $request->validated();
      $isAuth = Sentinel::authenticate($request->all());
      if ($isAuth){
        SendEmail::dispatch($isAuth->email)->delay(now()->addMinutes(1));
        return redirect()->route("prepaid-balance");
      }
      return redirect()->route("login");


    }
    catch(ThrottlingException $throttling){

    }
    catch(NotActivatedException $notActive){

    }
  }
  
}
