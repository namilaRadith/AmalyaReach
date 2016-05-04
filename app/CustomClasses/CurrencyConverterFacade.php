<?php
    namespace App\CustomClasses;

    class CurrencyConverterFacade
    {
        private $currency_from;
        private $currency_to;
        private $exchange_rate;

        public function setCurrencyFrom($currency) {
            $this->currency_from = $currency;
        }

        public function setCurrencyTo($currency) {
            $this->currency_to = $currency;
        }

        public function getExchangeRate() {
            $this->getRate();
            return $this->exchange_rate;
        }

        public function getGoogleRate(){
            $google = new GoogleCurrency();

            $google->setCurrencyFrom($this->currency_from);
            $google->setCurrencyTo($this->currency_to);

            $rate = $google->getRate();
            return $rate;
        }

        public function getYahooRate(){
            $yahoo = new YahooCurrency();

            $yahoo->setCurrencyFrom($this->currency_from);
            $yahoo->setCurrencyTo($this->currency_to);

            $rate = $yahoo->getRate();
            return $rate;
        }



        public function getRate(){
            $google_rate = $this->getGoogleRate();
            $yahoo_rate = $this->getYahooRate();

            if($google_rate >= $yahoo_rate){
                $this->exchange_rate = number_format((float)$google_rate, 2, '.', '');
            }else{
                $this->exchange_rate = number_format((float)$yahoo_rate, 2, '.', '');
            }
        }



    }




    class GoogleCurrency
    {
        private $currency_from;
        private $currency_to;
        private $exchange_rate;


        public function getCurrencyFrom() {
            return $this->currency_from;
        }

        public function setCurrencyFrom($currency) {
            $this->currency_from = $currency;
        }

        public function getCurrencyTo() {
            return $this->currency_to;
        }

        public function setCurrencyTo($currency) {
            $this->currency_to = $currency;
        }

        public function getExchangeRate() {
            return $this->exchange_rate;
        }

        public function setExchangeRate($rate) {
            $this->exchange_rate = $rate;
        }


        public function getRate(){

            $currency_from = $this->currency_from;
            $currency_to   = $this->currency_to;

            $get = file_get_contents("https://www.google.com/finance/converter?a=1&from=$currency_from&to=$currency_to");
            $get = explode("<span class=bld>",$get);
            $get = explode("</span>",$get[1]);
            $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);

            return $converted_amount;

        }

    }

    class YahooCurrency
    {
        private $currency_from;
        private $currency_to;
        private $exchange_rate;


        public function getCurrencyFrom() {
            return $this->currency_from;
        }

        public function setCurrencyFrom($currency) {
            $this->currency_from = $currency;
        }

        public function getCurrencyTo() {
            return $this->currency_to;
        }

        public function setCurrencyTo($currency) {
            $this->currency_to = $currency;
        }

        public function getExchangeRate() {
            return $this->exchange_rate;
        }

        public function setExchangeRate($rate) {
            $this->exchange_rate = $rate;
        }


        public function getRate(){

            $from   = $this->currency_from;
            $to     = $this->currency_to;

            $url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
            $handle = @fopen($url, 'r');

            if ($handle) {
                $result = fgets($handle, 4096);
                fclose($handle);
            }
            $allData = explode(',',$result); /* Get all the contents to an array */
            $dollarValue = $allData[1];

            return $dollarValue;


        }

    }


?>