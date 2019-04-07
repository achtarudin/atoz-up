<?php
namespace App\Services\OrderFailed;

use App\Models\Product;
use App\Services\Interfaces\FailedOrder;

class FailedProduct implements FailedOrder
{
    public function markFailedStatus($code)
    {
        $status = Product::status($code);
        if ($status == 'unpaid') {
            Product::paid($code, 'failed');
        }
        $status2 = Product::status($code);
        echo "{$status2}";
    }
}
