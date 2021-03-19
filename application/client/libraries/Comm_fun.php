<?php
if(!defined('BASEPATH'))exit('No direct script access allowed'); 
class Comm_fun {
    
	/*PHP SMS*/
	function sendSMS($mobile,$message){
		$url = 'http://www.siegsms.com/postsms.aspx';
		$fields = array('userid'=>urlencode("mithas"),
		 'pass'=>urlencode("mithas@123"),
		 'phone'=>urlencode($mobile),
		 'msg'=>urlencode($message));$fields_string = '';
		foreach($fields as $key=>$value)
		{
		$fields_string .= $key.'='.$value.'&';
		}
		rtrim($fields_string,'&');$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_POST,count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		if($result!='#500#1'){
		}
		curl_close($ch);
	}
	
	function paymentReq($payload){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
	curl_setopt($ch, CURLOPT_HEADER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER,
				array("X-Api-Key:9dab1c0cfb6effca146e9ce5fd5b8fc6",
					  "X-Auth-Token:411c9892b6c68fa4594ee66a8dca7d29"));
	/*$payload = Array(
		'purpose' => 'FIFA 16',
		'amount' => '2500',
		'phone' => '9999999999',
		'buyer_name' => 'John Doe',
		'redirect_url' => 'http://www.example.com/redirect/',
		'send_email' => false,
		'webhook' => '',
		'send_sms' => false,
		'email' => 'foo@example.com',
		'allow_repeated_payments' => false
	);*/
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
	$response = curl_exec($ch);
	curl_close($ch); 
	$json_decode = json_decode($response, true);
	/*print_r($json_decode);*/
	$long_url = $json_decode['payment_request']['longurl'];
		header('Location:'.$long_url);
       /* print_r($long_url);*/
	/*echo $response;*/
	}
	
	function getpaydet($payment_id){
		$ch = curl_init();
		//curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/.'$payment_id'/');
			curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payments/'.$payment_id.'/');
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER,
					array("X-Api-Key:9dab1c0cfb6effca146e9ce5fd5b8fc6",
						  "X-Auth-Token:411c9892b6c68fa4594ee66a8dca7d29"));

		$response = curl_exec($ch);
		curl_close($ch); 
		$json_decode = json_decode($response, true);
		//print_r($json_decode);exit;
		return $json_decode;
	}
}

?>