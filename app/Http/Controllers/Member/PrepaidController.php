<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Events\CreateHistory;
use App\Models\Sentinel\User;
use App\Models\Topup;
use App\Http\Requests\ValidatePrepaid;
use App\Http\Controllers\Controller;

class PrepaidController extends Controller
{
  public function index() {
    $topupValue = collect([10000, 50000, 100000]);
    return view("member.prepaid_balance", compact("topupValue"));
  }

  public function store(ValidatePrepaid $request) {
    $request->validated();
    $user  = User::findById();
    $topup = new Topup([
      "phone_number" => $request->phone_number,
      "topup_value" => $request->topup_value,
      "topup_code" => Topup::generateCode(),
    ]);
    $userTopup = $user->topup()->save($topup);
    event(new CreateHistory($userTopup));
  }
}
