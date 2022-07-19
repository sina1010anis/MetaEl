<?php 

namespace App\Repository\Front\User;

use App\Models\Cart;
use App\Models\factor;
use Shetabit\Multipay\Invoice;
use App\Repository\Front\Data\Created;
use App\Repository\Front\QueryDatabase;
use Inertia\Inertia;
use Shetabit\Payment\Facade\Payment as PaymentShetabit;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class Payment extends Geter{
    private $amount_t;
    private $transactionId;
    use GetNumber , GetTotalPrice , QueryDatabase , Created;

    public function amount(){
        $invoice = new Invoice;
        $this->amount_t =  $invoice->amount($this->sum());
        return $this;
    }

    public function set(){
        return PaymentShetabit::purchase($this->amount_t, function($driver, $transactionId) {
            $this->transactionId = $transactionId;
            $this->create(new factor()  , $this->data_factor($transactionId));
        })->pay()->render();
    }

    public function verify(){
        try {
            $receipt = PaymentShetabit::amount($this->sum())->transactionId(($this->get_code_factor()->code_pay))->verify();
            $this->update(new factor() , ['code_pay' => $this->get_code_factor()->code_pay] , ['buy_status' => 200 , 'send_status' => 100]);
            $this->delete(new Cart() , ['user_id' => auth()->user()->id]);
            return Inertia::render('Payment/SuccessfulPay' , [
                'code' => ($this->get_code_factor())->code_pay,
                'msg' => $receipt->getReferenceId()
            ]);
        } catch (InvalidPaymentException $exception) {
            $this->update(new factor() , ['code_pay' => $this->get_code_factor()->code_pay] , ['buy_status' => 404 , 'send_status' => 404]);
            $this->delete(new Cart() , ['user_id' => auth()->user()->id]);
            return Inertia::render('Payment/UnsuccessfulPay' , [
                'code' => ($this->get_code_factor())->code_pay,
                'msg' => $exception->getMessage()
            ]);
        }
    }
}

?>