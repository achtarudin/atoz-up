<?php
namespace App\Services\OrderFailed;

use App\Models\Topup;
use App\Services\Interfaces\FailedOrder;

class FailedTopup implements FailedOrder
{
    public function markFailedStatus($code)
    {
        $status = Topup::status($code);
        if ($status == 'unpaid') {
            Topup::paid($code, 'failed');
        }
        $status2 = Topup::status($code);
        echo "{$status2}";

    }
}
