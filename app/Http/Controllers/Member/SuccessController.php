<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\FailedOrderJob;

class SuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('success.page');
    }

    public function index(Request $request)
    {
        $order = [
          "code" => $request->session()->get('orderNo'),
          "total" => $request->session()->get('total'),
          "type" => $request->session()->get('type'),
          "message" => $request->session()->get('message'),
        ];
        FailedOrderJob::dispatch($order)->delay(now()->addMinutes(config('order.time')));
        return view("member.success")->with('order', $order);
    }
}
