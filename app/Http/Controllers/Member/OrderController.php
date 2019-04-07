<?php

namespace App\Http\Controllers\Member;

use Sentinel;
use App\Models\Topup;
use App\Models\Product;
use App\Models\OrderHistory;
use App\Models\Sentinel\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{
    public function index()
    {
        $userId = User::findById();
        $userHistory = OrderHistory::userHistories($userId->id)->paginate(5);
        return view("member.order", compact('userHistory'));
    }

    public function payOrder(Request $request, $id)
    {
        $orderHistory =  OrderHistory::find($id);
        $orderNo = $orderHistory->historiesable->code;
        $type = $orderHistory->historiesable_type;
        $request->session()->flash('type', $type);
        return view('member.payment', compact("orderNo"));
    }

    public function searchOrder(Request $request) {
      return redirect()->route('history-order');
    }
}
