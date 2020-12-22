<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

function gen_credit($orderId, $amount, $userId){
    $saleId = 'ef1dbec1e555b8416e6bf8e7396e1edbc91a8952e80f95cda6a3d2ef3917296a';
    $merchantId = '37222';
    $secrteKey = "SaltTEPS";
    $amount = $amount."00";
    $mobile = "";
    $url = base_url()."payment/savePayment/".$userId;

    $integrityStr = hash('sha256', $saleId.$merchantId.$orderId.$amount.$secrteKey);

    $parameter = "projectCode=TEPS&command=RequestOrderTepsApi&sid=ef1dbec1e555b8416e6bf8e7396e1edbc91a8952e80f95cda6a3d2ef3917296a&redirectUrl=".$url."&merchantId=37222&orderId=".$orderId."&purchaseAmt=".($amount)."&currency=THB&paymentMethod=4&productDesc=&smsMobile=".$mobile."&mobileNo=&smsFlag=N&tokenKey=&orderExpire=720&integrityStr=".$integrityStr;

    $url = "https://sandbox.mpay.co.th/mpay-sandbox-api/InterfaceService?";
    
    return $url.$parameter;
}

function send_line_message($sMessage){

    $sToken = "RndmS8LeYpCNaUvrfuJvTtqGVU2LndNTDWmce3Be2eg";
	// $sMessage = "มีรายการสั่งซื้อเข้าจ้า....";

	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		// echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   
}