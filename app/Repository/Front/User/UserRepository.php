<?php

namespace App\Repository\Front\User;

use App\Models\factor;
use App\Repository\Front\Data\Created;
use App\Repository\Front\QueryDatabase;
use App\Repository\Front\User\Payment as UserPayment;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

trait UserRepository {

    use GetNumber , GetTotalPrice , QueryDatabase , Created;

    public function buy_product(UserPayment $user_payment , $code)
    {
        $user_payment->amount($code);
        return $user_payment->set($code);
        
    }

    public function call_back_profile(UserPayment $user_payment)
    {
        return $user_payment->verify();
    } 
}

?>