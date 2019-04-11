<?php

namespace App\Http\Controllers;

use App\Models\Topup;
use App\Models\Product;
use App\Models\OrderHistory;
use Illuminate\Http\Request;
use App\Models\Sentinel\User;
use Illuminate\Support\Facades\DB;

class JoinController extends Controller
{
    public function join(User $user, Topup $topup, Product $product)
    {
        $topupUser = $user->find(1)->topup->where('code', 'TPe35f26b2')->first();
        $productUser = $user->find(1)->product->where('code', 'PR1b2b9713')->first();
        dd($topupUser, $productUser, \Auth::user());
    }
}
