<?php
    class Leopard {
        private $apiKey;
        private $apiPassword;
        private $curlUrl = "http://new.leopardscod.com/webservice/";
        private $format;
        private $isPostRequest;
        private $postFields = [];
        
        public function __construct( $format = 'json' ){
            $this->apiKey = "";
            $this->apiPassword = "";
            $this->format = $format;
            $this->postFields['api_key'] = $this->apiKey;
            $this->postFields['api_password'] = $this->apiPassword;
        }
        
        public function getAllCities(){
            $this->curlUrl .= "getAllCities";
        }
        
        public function trackBookedPacket( $track_numbers ){
            $this->curlUrl .= "trackBookedPacket";
            $this->postFields['track_numbers'] = $track_numbers;
        }
        
        public function bookPacket(){
            $this->curlUrl .= "bookPacket";
        }
        
        public function cancelBookedPackets( $cn_numbers ){
            $this->curlUrl .= "cancelBookedPackets";
            $this->postFields['cn_numbers'] = $cn_numbers;
        }
        
        public function generateLoadSheet( $cn_numbers, $courier_name, $courier_code ){
            $this->curlUrl .= "generateLoadSheet";
            $this->postFields['cn_numbers'] = $cn_numbers;
            $this->postFields['courier_name'] = $courier_name;
            $this->postFields['courier_code'] = $courier_code;
        }
        
        public function downloadLoadSheet( $load_sheet_id, $response_type ){
            $this->curlUrl .= "downloadLoadSheet";
            $this->postFields['load_sheet_id'] = $load_sheet_id;
            $this->postFields['response_type'] = $response_type;
        }
        
        public function getBookedPacketLastStatus( $from_date, $to_date ){
            $this->curlUrl .= "getBookedPacketLastStatus";
            $this->postFields['from_date'] = $from_date;
            $this->postFields['to_date'] = $to_date;
        }
        
        public function shipperAdviceList( $from_date, $to_date, $origin_city, $destination_city ){
            $this->curlUrl .= "shipperAdviceList";
            $this->postFields['from_date'] = $from_date;
            $this->postFields['to_date'] = $to_date;
            $this->postFields['origin_city'] = $origin_city;
            $this->postFields['destination_city'] = $destination_city;
        }
        
        public function shipperAdviceAdd( $track_number, $advice_comment ){
            $this->curlUrl .= "shipperAdviceAdd";
            $this->postFields['track_number'] = $track_number;
            $this->postFields['advice_comment'] = $advice_comment;
        }
        
        public function getShipmentDetailsByOrderID( $shipment_order_id ){
            $this->curlUrl .= "getShipmentDetailsByOrderID";
            $this->postFields['shipment_order_id'] = $shipment_order_id;
        }
        
        public function getCurlRequest(){
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, $this->curlUrl.'/format/'.$this->format.'/');
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_POST, 1);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $this->postFields);
            
            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);
        }
        
        public function postCurlRequest(){
            $curl_handle = curl_init();
            curl_setopt($curl_handle, CURLOPT_URL, 'http://new.leopardscod.com/webservice/getAllCitiesTest/format/json/'); // Write here Test or Production Link
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_handle, CURLOPT_POST, 1);
            curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
                'api_key' => 'your_api_key',
                'api_password' => 'your_api_password'
            ));
            
            $buffer = curl_exec($curl_handle);
            curl_close($curl_handle);
        }
        
        
    }