<?php

namespace App\Http\Controllers\Member;

use App\Models\Topup;
use App\Events\CreateHistory;
use App\Models\Sentinel\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePrepaid;

class PrepaidController extends Controller
{
  public function index(Request $request) {
    $request->session()->forget(['orderNo', 'total', 'message', 'type']);
    $topupValue = collect([10000, 50000, 100000]);
    return view("member.prepaid_balance", compact("topupValue"));
  }

  public function store(ValidatePrepaid $request) {
    $request->validated();
    $user  = User::findById();
    $topup = new Topup([
      "phone_number" => $request->phone_number,
      "value" => $request->topup_value,
      "code" => Topup::generateCode(),
    ]);
    $userHistory = $user->topup()->save($topup);
    event(new CreateHistory($userHistory));
    return redirect()->route('success');
  }
}
