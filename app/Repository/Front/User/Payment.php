<?php 

namespace App\Repository\Front\User;

use App\Models\Cart;
use App\Models\factor;
use App\Models\product_factor;
use Shetabit\Multipay\Invoice;
use App\Repository\Front\Data\Created;
use App\Repository\Front\QueryDatabase;
use Inertia\Inertia;
use Shetabit\Payment\Facade\Payment as PaymentShetabit;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class Payment extends Geter{

    use GetNumber , GetTotalPrice , QueryDatabase , Created;

    public $amount_t;
    public $amount_a;
    private $transactionId;
    public $is_code;

    public function amount($code){
        $invoice = new Invoice;
        $this->amount_t =  $invoice->amount($this->sum($code));
        $this->amount_a = $this->sum($code);
    }

    public function set($code){
        $this->create(new factor()  , $this->data_factor(404 , $this->amount_a));
        return PaymentShetabit::purchase($this->amount_t, function($driver, $transactionId) {
            $this->transactionId = $transactionId;
            $this->update_f(new factor()  , ['user_id' => auth()->user()->id] , ['code_pay' => $transactionId]);
        })->pay()->render();
    }

    public function verify(){
        try {
            $receipt = PaymentShetabit::amount($this->get_code_factor()->total_price)->transactionId(($this->get_code_factor()->code_pay))->verify();
            $this->post_purchase_operation_try();
            return Inertia::render('Payment/SuccessfulPay' , [
                'code' => ($this->get_code_factor())->code_pay,
                'msg' => $receipt->getReferenceId()
            ]);
        } catch (InvalidPaymentException $exception) {
            $this->post_purchase_operation_catch();
            return Inertia::render('Payment/UnsuccessfulPay' , [
                'code' => ($this->get_code_factor())->code_pay,
                'msg' => $exception->getMessage()
            ]);
        }
    }
    public function set_cart_to_factor($data , $factor_id)
    {
        $product_factor = new product_factor();
        foreach($data as $item)
        {
            $this->create($product_factor , ['factor_id' => $factor_id , 'product_id' => $item->size_product_id , 'price' => $item->total_price , 'number' => $item->number]);
        }
    }
    
    public function post_purchase_operation_try(){
        $data_cart = Cart::whereUser_id(auth()->user()->id)->get();
        $this->update(new factor() , ['code_pay' => $this->get_code_factor()->code_pay] , ['buy_status' => 200 , 'send_status' => 100]);
        $this->set_cart_to_factor($data_cart , $this->get_code_factor()->id);
        $this->delete(new Cart() , ['user_id' => auth()->user()->id]);
    }

    public function post_purchase_operation_catch(){
        $this->update(new factor() , ['code_pay' => $this->get_code_factor()->code_pay] , ['buy_status' => 404 , 'send_status' => 404]);
        $this->delete(new Cart() , ['user_id' => auth()->user()->id]);
    }
}

?>