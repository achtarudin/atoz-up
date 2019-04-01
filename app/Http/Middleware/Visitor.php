<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
class Visitor
{
  public function handle($request, Closure $next){
    if(!Sentinel::check()){
      return $next($request);
    }
      return redirect()->route('prepaid-balance');
  }
}
