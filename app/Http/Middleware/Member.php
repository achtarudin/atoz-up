<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class Member{
    
  public function handle($request, Closure $next){
    if (Sentinel::check()) {
      return $next($request);
    } 
    else {
      return redirect('/');
    }
  }
}
