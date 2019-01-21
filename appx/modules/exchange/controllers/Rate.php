<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| RATE CONTROLLER
|--------------------------------------------------------------------------
|Gets exchange rates from the jsonrates API and updates the rates in the system
|
*/
class Rate extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        $this->load->model('ExchangeRate');

    }

    public function index()
    {
  
    }

    #get current rates from jsoncurrency API
    public function get_rates(){

        
        $endpoint = 'live';
        $access_key = '6b976c41ce198b8b5d28f7890bd447f9';
        // Initialize CURL:
        $ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $exchangeRates = json_decode($json, true);
        
        #calculate the inverse rates  

        #calculate ZAR -> USD Rate 
        $zar_usd =  1 / $exchangeRates['quotes']['USDZAR'];
        # ZAR -> GBP
        $gbp_usd = (1 / $exchangeRates['quotes']['USDGBP']);
        $zar_gdp = $zar_usd / $gbp_usd;
        #ZAR->EUR
        $eur_usd = (1 / $exchangeRates['quotes']['USDEUR']);
        $zar_eur = $zar_usd / $eur_usd;
        #ZAR->KES
        $kes_usd = (1 / $exchangeRates['quotes']['USDKES']);
        $zar_kes = $zar_usd / $kes_usd;

        
        $updated_rates = array(
            array(
              'er_id' => 1 , // ZAR -> GBP
              'er_rate' => $zar_gdp 
            ),
            array(
              'er_id' => 2 , // ZAR -> EUR
              'er_rate' => $zar_eur
            ),
            array(
              'er_id' => 3 , // ZAR -> EUR
              'er_rate' => $zar_kes
            ),
            array(
              'er_id' => 4 , // ZAR -> EUR
              'er_rate' => $zar_usd
            )
        );
        
        #batch update db
        $this->ExchangeRate->update_rates($updated_rates);

        echo "Your exchange rates have been successfully updated";

        // else do some exception handling here
    }

}