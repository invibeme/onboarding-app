<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-type: application/json');
 //$API_ENDPOINT = 'https://api-ng.chekintest.xyz';
 $API_ENDPOINT = 'https://a.chekin.io';
 
 
$post = $_POST;

$email = isset($post['erf_username'])? $post['erf_username']:"";
$password = isset($post['erf_password'])? $post['erf_password']:"";
$otp_token = isset($post['otp_token'])? $post['otp_token']:"";
$code = isset($post['code'])? $post['code']:"";
$otp_type = isset($post['otp_type'])? $post['otp_type']:"";

$error = "";
if(empty($email)){
	$error = "Please enter valid email";;
}else if(empty($password)){
	$error ="Please enter valid password";
	
}

if(!empty($error)){
	echo json_encode(['status'=>false,'curl_response'=>$error]);
	//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	die();
	
}

$postData = [
"email"=>$email,
"password"=>$password
];




//curl Call

$CURLOPT_URL = $API_ENDPOINT.'/api/v3/api-token-auth/';

if(!empty($otp_token)){
	$CURLOPT_URL = $API_ENDPOINT.'/api/v3/token/otp/';
	$postData += [
	    'otp_token' => $otp_token,    
	    'code' => $code,
	    'otp_type' => $otp_type
	];
}

//print_r($CURLOPT_URL); print_r(json_encode($postData)); die;

$curl = curl_init();
//https://api-ng.chekintest.xyz
curl_setopt_array($curl, array(
  //CURLOPT_URL => $API_ENDPOINT.'/api/v3/api-token-auth/',
  CURLOPT_URL => $CURLOPT_URL,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($postData),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl); 
$response =(array) json_decode($response);
$msg = isset($response[0]) ? $response[0] : "";

if(strpos(strtolower($msg),"error")!==false){
	echo json_encode(['status'=>false,'curl_response'=>$msg]);
}else{
	echo json_encode(['status'=>true, 'curl_response'=>$response] );
}



curl_close($curl); 
