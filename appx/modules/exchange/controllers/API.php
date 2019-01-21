<?php
/*
|--------------------------------------------------------------------------
| FOREX EXCHANGE API
|--------------------------------------------------------------------------
|Handles all CRUD operations for buying foreign currency
|
*/

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
 
class Api extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ExchangeRate');
        $this->load->model('Surcharge');
        $this->load->model('Order');
        $this->load->model('Discount');
        $this->load->model('OrderDiscount');
       
    }

    public function index(){
       
    }

    # get ZAR to chosen currency rate
    function rateByID_get(){

        $currency_id  = $this->get('currency_id');
        
        if(!$currency_id){

            $this->response("Please specify a currency", 400);

            exit;
        }

        $result = $this->ExchangeRate->getratebyid( $currency_id );

        if($result){

            $this->response($result, 200); 

            exit;
        } 
        else{

             $this->response("Chosen currency is not in the system.", 404);

            exit;
        }
    } 

    #get surcharge for any currency
    function surchargeByCurrency_get($foreign_currency){

        $surcharge_percentage = $this->Surcharge->getsurcharge( $foreign_currency );

        return $surcharge_percentage;
        
    }


    #place an order - API call
    function addOrder_post(){

         $foreign_currency      = strip_tags($this->post('foreignCurrency'));

         $exchange_rate     = strip_tags($this->post('exchangeRate'));

         $forex_amt    = strip_tags($this->post('foreignCurrencyAmt'));

         $base_currency_amt  = strip_tags($this->post('baseCurrencyAmount'));

        
         if(!$foreign_currency || !$exchange_rate || !$forex_amt || !$base_currency_amt ){

                $this->response("Please fill in all the details to place an order", 400);

         }else{

            #get surcharge percentage
            switch ($foreign_currency) {
                case 'USD':
                    $surcharge_perc = $this->surchargeByCurrency_get($foreign_currency);
                    $surcharge_amt = $base_currency_amt * $surcharge_perc;
                    $total_amount = $base_currency_amt + $surcharge_amt;
                    break;
                case 'GBP':
                    $surcharge_perc = $this->surchargeByCurrency_get($foreign_currency);
                    $surcharge_amt = $base_currency_amt * $surcharge_perc;
                    $total_amount = $base_currency_amt + $surcharge_amt;
                    break;
                case 'EUR':
                    $surcharge_perc = $this->surchargeByCurrency_get($foreign_currency);
                    $surcharge_amt = $base_currency_amt * $surcharge_perc;
                    $total_amount = $base_currency_amt + $surcharge_amt;
                    break;
                case 'KES':
                    $surcharge_perc = $this->surchargeByCurrency_get($foreign_currency);
                    $surcharge_amt = $base_currency_amt * $surcharge_perc;
                    $total_amount = $base_currency_amt + $surcharge_amt;
                    break;
                
                default:
                    # code...
                    break;
            }

            $result = $this->Order->addorder(array("fc_name"=>$foreign_currency, "er_rate"=>$exchange_rate, "or_surcharge_percentage"=>$surcharge_perc, "or_foreign_currency"=>$forex_amt, "or_domestic_currency"=>$total_amount, "or_surcharge_amount"=>$surcharge_amt, "or_date"=>date('Y-m-d H:i:s')));

            if($result === 0){

                $this->response("Oops something went wrong!", 404);

            }else{

                #extra steps
                switch ($foreign_currency) {
                    case 'GBP':
                        #get the order details
                        $order_details = $this->Order->getorderbyid($result);
                        
                        #send email
                        $to = 'admin@forextrader.com';//can replace this with any other email address for testing purposes
                        $cc = 'pintosoft@gmail.com';
                        $subject = "Order Confirmation from Forex Trader";
                        $message = $this->load->view('order_email','',true);
                        $this->send_email($to,$cc,$subject,$message);
                        break;

                    case 'EUR':
                        $discount = $this->Discount->getdiscount($foreign_currency);
                        $final_amt = $total_amount - ( $total_amount * $discount );
                        #save the discount details
                        $this->OrderDiscount->adddiscount(array('od_final_amount'=>$final_amt,'or_id'=>$result,'od_created'=>date('Y-m-d H:i:s')));
                        break;
                    
                    default:
                        # code...
                        break;
                }

                $this->response("Order has been successfully placed", 200);  
          
            }

        }

    }

    #send email 
    public function send_email($to, $cc = '', $subject, $message){
        $this->load->library('email');
        $this->email
            ->from('info@forextrader.com')
            ->to($to)
            ->cc($cc)
            ->subject($subject)
            ->message($message)
            ->set_mailtype('html'); 
            // send email
            $this->email->send();
            return true;
    }

}