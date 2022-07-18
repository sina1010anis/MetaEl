<?php

namespace App\Repository\Front\User;

use App\Models\factor;
use App\Repository\Front\Data\Created;
use App\Repository\Front\QueryDatabase;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

trait UserRepository {

    use GetNumber , GetTotalPrice , QueryDatabase , Created;

    public function buy_product(Invoice $invoice , factor $factor){
        $invoice->amount($this->total_price());
        return Payment::purchase($invoice, function($driver, $transactionId) {
            $this->create(new factor()  , $this->data_factor($transactionId));
        })->pay()->render();
    }
}

?>