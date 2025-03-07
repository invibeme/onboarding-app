<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-type: application/json');
 $API_ENDPOINT = 'https://api-ng.chekintest.xyz';
 
 
//Mapping param
$resultParam = []; 
$post = $_POST;

//Array config
$requiredParam =[
"api_key"=>"field-lhZmTo5TX3xTATR",
"email"=> "field-VrrOfB8fFx0bl07",
"password"=>"field-wO3sTA2wvtu6oeB",
"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb",
];
foreach($requiredParam as $key=>$val){
	$resultParam[$key] = isset($post[$val]) && !empty($post[$val]) ? $post[$val]:"";
} 

$propertyType = isset($_POST['field-aD7ucdKDH7uqiq3']) ? $_POST['field-aD7ucdKDH7uqiq3']:"";

$email_first = isset($_POST['text-gE8dLd']) ? $_POST['text-gE8dLd']:"";
$pass_first = isset($_POST['text-1hJwzr']) ? $_POST['text-1hJwzr']:"";

$email_last = isset($_POST['field-VrrOfB8fFx0bl07']) ? $_POST['field-VrrOfB8fFx0bl07']:"";
$pass_last = isset($_POST['field-wO3sTA2wvtu6oeB']) ? $_POST['field-wO3sTA2wvtu6oeB']:"";


$error = "";
if(empty($email_first)){
	$error = "Please enter step-1 valid email";
}else if(empty($pass_first)){
	$error ="Please enter step-1 valid password";
	
}else if(empty($pass_last)){
	$error ="Please confirm password";
	
}else if($pass_last!=$pass_first){
	$error ="Password don't match!";
	
}else if($email_first!=$email_last){
	$error ="Email don't match!";
	
}else if(empty($resultParam['api_key'])){
	$error="Please enter valid API key";
}else if(empty($resultParam['email'])){ 
	$error ="Please enter valid email";
}else if(empty($resultParam['password'])){
	$error ="Please enter valid password";
}else if(empty($resultParam['estimated_range_of_managed_properties'])){
	$error ="Please select a valid range";
}

if(!empty($error)){
	echo json_encode(['status'=>false,'curl_response'=>$error]);
	//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	die();
	
}



//function_exists
function getPlanType($API_ENDPOINT, $propertyType){
	
	try{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $API_ENDPOINT.'/api/v3/payments/plans/?interval=MONTH&type='.$propertyType,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return  json_decode($response);

	}catch(Exception $ex){
		print_r($ex->getMessage());
	}
		
}





$getPlanResponse = "";

$getPlanResponse = getPlanType($API_ENDPOINT, $propertyType); 
$plan= isset($getPlanResponse->unique_id) ? $getPlanResponse->unique_id:"";
if(empty($plan)){
	echo json_encode(['status'=>false,'curl_response'=>"Invalid plan selection"]);
	//header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
	die();
}

$resultParam['subscription'] = [
	'type'=> $propertyType,//"HOU", // MUst be dynamic after client confirmation
	'items'=>[
		[
			"plan"=>$plan,//"price_1IIy9GHkTG7BbsCy6yNEO9jv",
            "quantity"=> null
		]
	]
	
];


//$resultParam['api_key']="123";

//curl Call


$curl = curl_init();
//https://api-ng.chekintest.xyz
curl_setopt_array($curl, array(
  CURLOPT_URL => $API_ENDPOINT.'/api/v3/guesty/users/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>json_encode($resultParam),
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
//echo $response;


/*
{
    "api_key": "ngjgjhgjhg",
    "email": "i.grabar+100@exaft.com",
    "password": "123",
    "estimated_range_of_managed_properties": "1 - 4",
    "subscription": {
        "type": "HOU",
        "items": [
            {
                "plan": "price_1IIy9GHkTG7BbsCy6yNEO9jv",
                "quantity": null
            }
        ]
    }
}
*/