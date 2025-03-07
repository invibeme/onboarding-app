<?php
ini_set('max_execution_time', '0');
header('Content-type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "config.php";


//print_r($_POST); die;




class ChekinAPI
{

	public $post = [];
	public  $api = "";
	public $forms = [];
	public $path = "";

	function __construct($post, $forms)
	{
		$this->post = $post;
		$this->forms = $forms;
	}

	public function processRequest()
	{

		try {

			$this->api = isset($this->forms['API_END']) ? $this->forms['API_END'] : "";
			return $this->guesty();
		} catch (Exception $e) {
			return ['status' => false, 'message' => $e->getMessage()];
		}
	} //End of function



	public function guesty()
	{
		$is_free = 0;
		try {
			if (isset($this->post["are_tokens_refetched"])) {
				$refetched_val = strval($this->post["are_tokens_refetched"]);
			}
			if (isset($this->post["collaborator_token"])) {
				$collaborator_token = strval($this->post["collaborator_token"]);
			}

			$pms = isset($this->post['pmsSelected']) ? $this->post['pmsSelected'] : "";
			$urlpms = isset($this->post['urlpms']) ? $this->post['urlpms'] : "";
			$lang = isset($this->post['lang']) ? $this->post['lang'] : "";

			if (isset($this->post['shortnames'])) {
				$this->post['shortnames'] = implode(",", $this->post['shortnames']);
			}

			if (empty($pms)) {
				if ($refetched_val != '1'  && empty($collaborator_token)) {
					$pmsmsg = '';
					if ($lang == 'es-ES') {
						$pmsmsg = 'Selección de pms no válida';
					} elseif ($lang == 'it-IT') {
						$pmsmsg = 'Selezione pms non valida';
					} elseif ($lang == 'pt-pt') {
						$pmsmsg = 'Seleção de pms inválida';
					} else {
						$pmsmsg = 'Invalid pms selection';
					}
					return ['status' => false, 'message' => "invalid pms selection"];
				}
			}

			if ($pms == 'Resharmonics') {
				$validate = $this->validateResharmonicsFirstStep();

				if ($validate != true) {
					throw new Exception("Please enter valid Resharmonics credentail");
				}
			}

			$this->path  = isset($this->forms[$pms]['config']['path']) ? $this->forms[$pms]['config']['path'] : "";
			$requiredParam  = isset($this->forms[$pms]['config']['form_field']) ? $this->forms[$pms]['config']['form_field'] : [];
			$resultParam = [];
			//$resultParam['lang'] = $lang;
			$resultParam['lang'] = strtoupper(explode("-", $lang)[0]);

			$apiURL = $this->api . '/api/v3/' . $this->path . '/users/';
			if ($pms == "I don't use a PMS" || $pms == "Others PMS" || $pms == "Chekin" || $pms == "MasterYield" || $pms == "ABAL_Consulting" || $pms == 'Beds24' || $pms == 'Booking Automation' || $pms == 'dataHotel'  || $pms ==  'Planyo' || $pms == '5STELLE' || $pms == 'AQHOLDER' || $pms == 'BRILLANTEZ' || $pms == 'GUESTCENTRIX' || $pms == 'EASYREZ' || $pms == 'GOLDENUP' || $pms == 'HOTELTIME' || $pms == 'IBELSA' || $pms == 'INNKEYPMS' || $pms == 'MISTERBOOKING' || $pms == 'NEWBOOK' || $pms == 'OCCUPANCYPLUS' || $pms == 'PRENO' || $pms == 'RDPWIN' || $pms == 'ROOMRACCOON' || $pms == 'ROOMRANGER' || $pms == 'SHALOM' || $pms == 'SIRVOY' || $pms == 'THAISHOTELS' || $pms == 'TKSYSTEM' || $pms == 'VHP' || $pms == 'WINHMS' || $pms == 'WINHOTEL' || $pms == 'XENIA' || $pms == 'ZAVIA' || $pms == 'SMARTFX' || $pms == 'littlehotelier' || $pms == 'channelmanager' || $pms == 'Amenitiz') { // || $pms == 'FRONT2GO'
				$apiURL = $this->api . '/api/v3/auth/registration/?umt_source=UserRegistered';
				$requiredParam = [
					"email" => "text-gE8dLd",
					"password" => "text-1hJwzr",

					"estimated_range_of_managed_properties" => "field-UQwb7oDM9q4lihb"
				];
			}
			
			if ($pms == 'Beds24') {
				$resultParam['origin'] = 'BEDS24';
			} elseif ($pms == 'Booking Automation') {
				$resultParam['origin'] = 'BOOKINGAUTOMATION';
			} elseif ($pms == 'dataHotel') {
				$resultParam['origin'] = 'DATAHOTEL';
			} elseif ($pms ==  'Planyo') {
				$resultParam['origin'] = 'PLANYO';
			} elseif ($pms ==  'Avantio') {
				$resultParam['origin'] = 'AVANTIO';
			} elseif ($pms == '5STELLE' || $pms == 'AQHOLDER' || $pms == 'BRILLANTEZ' || $pms == 'GUESTCENTRIX' || $pms == 'EASYREZ' || $pms == 'GOLDENUP' || $pms == 'HOTELTIME' || $pms == 'IBELSA' || $pms == 'INNKEYPMS' || $pms == 'MISTERBOOKING' || $pms == 'NEWBOOK' || $pms == 'OCCUPANCYPLUS' || $pms == 'PRENO' || $pms == 'RDPWIN' || $pms == 'ROOMRACCOON' || $pms == 'ROOMRANGER' || $pms == 'SHALOM' || $pms == 'SIRVOY' || $pms == 'THAISHOTELS' || $pms == 'TKSYSTEM' || $pms == 'VHP' || $pms == 'WINHMS' || $pms == 'WINHOTEL' || $pms == 'XENIA' || $pms == 'ZAVIA' || $pms == 'SMARTFX' || $pms == 'littlehotelier' || $pms == 'channelmanager') { // || $pms == 'FRONT2GO' 
				$resultParam['origin'] = $pms;
				//$apiURL = $this->api.'/api/v3/siteminder/users/';
				$apiURL = $this->api . '/api/v3/pms-integrations/siteminder/users/';
				//$is_free = 1;
			} else {
				$resultParam['origin'] = 'DASHBOARD';
			}
			if ($pms == 'channelmanager' || $pms == 'littlehotelier') {
				$is_free = 1;
			}
			if ($pms == 'avaibook') {
				$resultParam['origin'] = 'avaibook';
			}
			
			if ($pms == 'FRONT2GO') {
				$resultParam['origin'] = 'FRONT2GO';
			}

			if ($pms == 'RENTALWISE') {
				$resultParam['pms_provider'] = 'RENTALWISE';
			}

			$resultParam['redirect_uri'] = 'https://chekin.com/onboarding/';


			if (!empty($this->post["text-VdkIuH"])) {
				$resultParam['name'] = strval($this->post["text-VdkIuH"]);
			}

			foreach ($requiredParam as $key => $val) {
				$resultParam[$key] = isset($this->post[$val]) && !empty($this->post[$val]) ? $this->post[$val] : "";
			}

			$propertyType = isset($this->post['field-aD7ucdKDH7uqiq3']) ? $this->post['field-aD7ucdKDH7uqiq3'] : "";
			$email_first = isset($this->post['text-gE8dLd']) ? $this->post['text-gE8dLd'] : "";
			$pass_first = isset($this->post['text-1hJwzr']) ? $this->post['text-1hJwzr'] : "";

			$resultParam['estimated_range_of_managed_properties'] = isset($this->post['roomNumberSelected']) ? $this->post['roomNumberSelected'] : "";

			// One Step
			if (empty($resultParam['estimated_range_of_managed_properties'])) {
				$resultParam['estimated_range_of_managed_properties'] = '1';
			}

			// Dynamic Fields
			if ($pms == 'Noray_2') {
				if($resultParam['pms_account_type'] == 'ON_PREMISE'){
		
				  $resultParam += [
					"protocol" => isset($this->post['protocol']) ? $this->post['protocol'] : "",
					"host" => isset($this->post['host']) ? $this->post['host'] : "",
					"port" =>  isset($this->post['port']) ? $this->post['port'] : "", 
					"business_central_version" => isset($this->post['business_central_version']) ? $this->post['business_central_version'] : "",
					"basic_username" =>  isset($this->post['basic_username']) ? $this->post['basic_username'] : "",
					"basic_password" => isset($this->post['basic_password']) ? $this->post['basic_password'] : "",
				];
		
				}else if($resultParam['pms_account_type'] == 'SAAS'){
		
				  $resultParam += [
				  "client_id" => isset($this->post['client_id']) ? $this->post['client_id'] : "",
				  "client_secret" => isset($this->post['client_secret']) ? $this->post['client_secret'] : "",
				  "tenant_id" => isset($this->post['tenant_id']) ? $this->post['tenant_id'] : "",
				  "environment" => isset($this->post['environment']) ? $this->post['environment'] : "", 
				  ];
		
				}
			  }

			//$email_last = isset($this->post['field-VrrOfB8fFx0bl07']) ? $this->post['field-VrrOfB8fFx0bl07']:"";
			//$pass_last = isset($this->post['field-wO3sTA2wvtu6oeB']) ? $this->post['field-wO3sTA2wvtu6oeB']:"";

			$error = "";
			if ($refetched_val != '1' && empty($collaborator_token)) {
				if (empty($email_first)) {
					$error = "Please enter step-1 valid email";
				} else if (empty($pass_first)) {
					$error = "Please enter step-1 valid password";
				}/*else if($pms=="Guesty" && empty($resultParam['api_key'])){
					$error="Please enter valid API key";
				}*/ else if (empty($resultParam['email'])) {
					$error = "Please enter valid email";
				} else if (empty($resultParam['password'])) {
					$error = "Please enter valid password";
				} else if (empty($resultParam['estimated_range_of_managed_properties'])) {
					$error = "Please select a valid range";
				}

				foreach ($resultParam as $key => $val) {
					if (empty($val)) {
						$error = str_replace("_", " ", $key) . ' is required';
						break;
					}
				}

				if (!empty($error)) {
					throw new Exception($error);
				}
			}
			$getPlanResponse = $this->getPlanType($propertyType, $is_free);

			//print_r($getPlanResponse); die;

			$plan = isset($getPlanResponse->unique_id) ? $getPlanResponse->unique_id : "";
			//if($pms != 'littlehotelier' && $pms != 'channelmanager'){
			if ($refetched_val != '1' && empty($collaborator_token)) {
				if (empty($plan)) {
					throw new Exception("Invalid plan selection");
				}

				if($is_free){
					$resultParam['subscription'] = [
						//'origin'=> 'Dashboard Desktop',
						'type' => $propertyType, //"HOU", // MUst be dynamic after client confirmation
						'max_quantity' => 0,
						"plan" => $plan
					];

				}else{
					$resultParam['subscription'] = [
						//'origin'=> 'Dashboard Desktop',
						'type' => $propertyType, //"HOU", // MUst be dynamic after client confirmation
						'items' => [
							[
								"plan" => $plan, //"price_1IIy9GHkTG7BbsCy6yNEO9jv",
								"quantity" => null
							]
						]

					];
				}
			}
			//}
			if ($pms == 'channelmanager') {
				//$resultParam['siteminder_modal'] = true;
			}
			$resultParam['are_tokens_refetch'] = false;
			if ($refetched_val == '1') {
				$resultParam['are_tokens_refetch'] = true;
				//$resultParam['email'] = $this->post['text-gE8dLd'];
				//$resultParam['access_token'] = $this->post['oauth_code']; // make for all PMS 

				//print_r($this->post['text-gE8dLd']);  
				//print_r(json_encode($resultParam));die;   
			}
			if (!empty($collaborator_token)) {
				$resultParam['collaborator_token'] = $collaborator_token;
			}
			$resultParam['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$resultParam['subscription_type'] = $propertyType;

			if($propertyType == 'HOU'){
				$resultParam['subscription_type_hbspt'] = 'VACATION RENTAL';
			}elseif($propertyType == 'HOT'){
				$resultParam['subscription_type_hbspt'] = 'HOTEL/CAMPING';
			}else{
				$resultParam['subscription_type_hbspt'] = 'Other';
			}
			
			// 4 different name for phone. Check which field has the value
			/* 	ES	field-HzUAlnXI74GXYVt	field-HzUAlnXI74GXYVt-intl
				EN	field-nnTpNbny6biI4RX	field-nnTpNbny6biI4RX-intl
				IT	field-6tmMjiNenscyRc3	field-6tmMjiNenscyRc3-intl
				PT	field-iOQkh6cdL1oyNR5	field-iOQkh6cdL1oyNR5-intl
			*/

			if (!empty($this->post["field-HzUAlnXI74GXYVt"])) { // ES
				if (isset($this->post["field-HzUAlnXI74GXYVt-intl"])) {
					$resultParam['phone'] = strval($this->post["field-HzUAlnXI74GXYVt-intl"]);
				} else {
					$resultParam['phone'] = strval($this->post["field-HzUAlnXI74GXYVt"]);
				}
			} elseif (!empty($this->post["field-nnTpNbny6biI4RX"])) { //EN
				if (isset($this->post["field-nnTpNbny6biI4RX-intl"])) {
					$resultParam['phone'] = strval($this->post["field-nnTpNbny6biI4RX-intl"]);
				} else {
					$resultParam['phone'] = strval($this->post["field-nnTpNbny6biI4RX"]);
				}
			} elseif (!empty($this->post["field-6tmMjiNenscyRc3"])) { //IT
				if (isset($this->post["field-6tmMjiNenscyRc3-intl"])) {
					$resultParam['phone'] = strval($this->post["field-6tmMjiNenscyRc3-intl"]);
				} else {
					$resultParam['phone'] = strval($this->post["field-6tmMjiNenscyRc3"]);
				}
			} elseif (!empty($this->post["field-iOQkh6cdL1oyNR5"])) { //PT
				if (isset($this->post["field-iOQkh6cdL1oyNR5-intl"])) {
					$resultParam['phone'] = strval($this->post["field-iOQkh6cdL1oyNR5-intl"]);
				} else {
					$resultParam['phone'] = strval($this->post["field-iOQkh6cdL1oyNR5"]);
				}
			}

			// Add phone for
			/*	if(!empty($this->post["field-HzUAlnXI74GXYVt"])){ 
				if(isset($this->post["field-HzUAlnXI74GXYVt-intl"])){
					$resultParam['phone'] = strval($this->post["field-HzUAlnXI74GXYVt-intl"]);
				}else{
					$resultParam['phone'] = strval($this->post["field-HzUAlnXI74GXYVt"]);
				}
			}
		*/
			// Add Name 
			if (!empty($this->post["field-xSCTWRzYXUEChX5"])) {
				$resultParam['name'] = strval($this->post["field-xSCTWRzYXUEChX5"]);  //ES
			} elseif (!empty($this->post["field-lkxR6yYkIa3mVUK"])) {
				$resultParam['name'] = strval($this->post["field-lkxR6yYkIa3mVUK"]);  //EN
			} elseif (!empty($this->post["field-ZaNu3suV2cNVZF4"])) {
				$resultParam['name'] = strval($this->post["field-ZaNu3suV2cNVZF4"]);  //IT
			} elseif (!empty($this->post["field-LyEis8aIB9f9CPx"])) {
				$resultParam['name'] = strval($this->post["field-LyEis8aIB9f9CPx"]);  //PT
			}

			//yourAddress
			if (!empty($this->post["yourAddress"])) {
				$resultParam['city'] = strval($this->post["yourAddress"]);
			}



			// bookiplyAccount
			if (!empty($this->post["bookiplyAccount"])) {
				//$resultParam['bookiplyAccount'] = strval($this->post["bookiplyAccount"]);
			}

			if(strval($this->post["bookiplyAccount"]) == "Yes"){
				$resultParam['external_service_account'] = TRUE;
			}else{
				$resultParam['external_service_account'] = FALSE;
			}
			
			//queryString
			if (!empty($this->post["queryString"])) {
				$urlQueryString = str_replace("?", "", strval($this->post["queryString"]));
				parse_str($urlQueryString, $urlqueryArray);
				$resultParam['marketing'] = $urlqueryArray;
			}

			if ($pms == 'Oracle') {
				$resultParam['hotels_id'] = implode(", ", $this->post["hotels_id"]);
		   }
		   
			if ($pms == 'Avantio') {
				$resultParam['send_lead_guest_data_on_client'] = false;
			}
			
			//cello_id
			if (!empty($this->post["cello_id"])) {
				$resultParam['cello_id'] = strval($this->post["cello_id"]); 
			}

			$hubspotutk = isset($_COOKIE['hubspotutk']) ? $_COOKIE['hubspotutk'] : null;
			$resultParam['hubspotutk'] = $hubspotutk;
			$resultParam['pageUri'] = 'https://chekin.com/onboarding/';
   			$resultParam['pageName'] = 'Signup Page';
			$resultParam['lastFormType'] = 'Onboarding';

			//echo $apiURL; print_r(json_encode($resultParam));die;    

			// bookiplyParam START 
			$bookiplyParam = [];

			if (isset($resultParam['name'])) {
				$bookiplyParam['name'] = $resultParam['name'];
			}
			if (isset($resultParam['email'])) {
				$bookiplyParam['email'] = $resultParam['email'];
			}
			if (isset($resultParam['phone'])) {
				$bookiplyParam['phoneNumber'] = $resultParam['phone'];
			}
			if (isset($resultParam['city'])) {
				$bookiplyParam['city'] = $resultParam['city'];
			}

			$bookiplyParam['regionId'] = null;
			$bookiplyParam['page'] = 'host';

			if (isset($resultParam['marketing'])) {
				$bookiplyParam['marketing'] = $resultParam['marketing'];
			}
			$bookiplyParam['marketing']['utm_source'] = "chekin";
			$bookiplyParam['marketing']['utm_medium'] = "internal";
			$bookiplyParam['marketing']['utm_content'] = "hp";

			$bookiplyParam['origin'] = "www.chekin.com";
			$bookiplyParam['lang'] = $resultParam['lang'];


			$apiURL2 = 'https://api.bookiply.com/rest/bookiply/web/v4/signup/inquiry/owner';

			//echo $apiURL2;
			//print_r(json_encode($bookiplyParam)); die; 

			// bookiplyParam END	


			$headers = array(
				'Content-Type: application/json'

			);

			if (isset($_POST['header_referer'])) {
				$headers[] = 'referer: ' . $_POST['header_referer'];
				$headers[] = 'origin: ' . $_SERVER['HTTP_ORIGIN'];
				$headers[] = 'user-agent: ' . $_SERVER['HTTP_USER_AGENT'];
				$headers[] = 'authority: ' . $this->api;
				$headers[] = 'sec-fetch-site: same-site';
				$headers[] = 'sec-fetch-mode: cors';
				$headers[] = 'X-Forwarded-For: ' . $_SERVER['REMOTE_ADDR'];

				//
			}

			//print_r($_SERVER); die;
			$curl = curl_init();
			//https://api-ng.chekintest.xyz
			curl_setopt_array($curl, array(

				CURLOPT_URL => $apiURL,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				//CURLOPT_CUSTOMREQUEST => 'GET',
				CURLOPT_POSTFIELDS => json_encode($resultParam),
				CURLOPT_HTTPHEADER => $headers,
			));

			$response = curl_exec($curl);
			//print_r($response); die;  
			
			$httpcode1 = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			//print_r($httpcode1); die;

			$response = (array) json_decode($response);
			//print_r($response); die;  
			$msg = isset($response[0]) ? $response[0] : "";

			$core_user_id =  isset($response['core_user_id']) ? $response['core_user_id'] : "";
			$core_user_id =  empty($core_user_id) && isset($response['id']) ? $response['id'] : $core_user_id;

			// added to work with core_id as well for Deskline
			$core_user_id =  empty($core_user_id) && isset($response['core_id']) ? $response['core_id'] : $core_user_id;
			$customErr = "";

			if ($refetched_val != '1') {
				if (empty($core_user_id)) {
					if ($response && isset($response['errors'])) {
						foreach ($response['errors'] as $inKey => $inVal) {
							if (is_object($inVal) && isset($inVal->message)) {
								$customErr .= $inVal->message . ", ";
							}
						}
					} else {
						foreach ($response as $key => $val) {
							if (is_array($val)) {
								foreach ($val as $inKey => $inVal) {
									$customErr .= $inVal . ", ";
								}
							} else {
								$customErr .= $val . ", ";
							}
						}
					}
				}
			}



			curl_close($curl);

			// check if server error START | 20-02-2024
			if (isset($httpcode1) && $httpcode1 === 500) {
				//echo "Bookiply account has been created"; 
				return  ['status' => false, 'curl_response' => '', 'message' => ' Server Error '.$httpcode1];
			}
			// check if server error END | 20-02-2024

			//print_r($customErr); die;
			if (!empty($customErr)) {
				$customErr = rtrim(trim($customErr), ",");
				throw new Exception($customErr);
			}

			if (strpos(strtolower($msg), "error") !== false) {
				throw new Exception($msg);
			} else if (isset($response['non_field_errors'][0])) {
				throw new Exception($response['non_field_errors'][0]);
			} else {
				// here Onboarding a/c ceated	

				// DISABLED bookiplyAccount creation from here BEACUASE now it's manage from BACKEND
				/* wait for BE team confirmation
				// Create Bookily Free account if bookiplyAccount == Yes | 19-12-2023
				//if (isset($resultParam['bookiplyAccount']) && $resultParam['bookiplyAccount'] === "Yes") {
				if (isset( $resultParam['external_service_account']) &&  $resultParam['external_service_account'] === TRUE) { 
					//echo $apiURL2;
					//print_r(json_encode($bookiplyParam)); die; 

					$curl2 = curl_init();
					curl_setopt_array($curl2, array(

						CURLOPT_URL => $apiURL2,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						//CURLOPT_CUSTOMREQUEST => 'GET',
						CURLOPT_POSTFIELDS => json_encode($bookiplyParam),
						CURLOPT_HTTPHEADER => $headers,
					));

					$response2 = curl_exec($curl2);

					$httpcode = curl_getinfo($curl2, CURLINFO_HTTP_CODE);


					curl_close($curl2);

					//print_r($httpcode); die;  // status: 200

					// check if bookiply a/c ceateded
					if (isset($httpcode) && $httpcode === 200) {
						//echo "Bookiply account has been created"; 
						return  ['status' => true, 'curl_response' => $response];
					} else {
						//	echo "Oops! There're some error while creating bookiply account!"; 
						return  ['status' => true, 'curl_response' => $response];
					}
				} else {
					return  ['status' => true, 'curl_response' => $response];
				}
				wait for BE team confirmation */

			// Make request for hubspot a/c START
				if (1) { 
			
					$apiURL3 = 'https://hook.eu2.make.com/mwrewwnlxyoik7zgrkv2vhfrmahyl4vx';
					//echo $apiURL3 ; print_r(json_encode($resultParam)); die; 

					$curl3 = curl_init();
					curl_setopt_array($curl3, array(

						CURLOPT_URL => $apiURL3,
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => '',
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 0,
						CURLOPT_FOLLOWLOCATION => true,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => 'POST',
						//CURLOPT_CUSTOMREQUEST => 'GET',
						CURLOPT_POSTFIELDS => json_encode($resultParam),
						CURLOPT_HTTPHEADER => $headers,
					));

					$response3 = curl_exec($curl3);

					$httpcode3 = curl_getinfo($curl3, CURLINFO_HTTP_CODE);


					curl_close($curl3);

					//print_r($httpcode3); die;  // status: 200

					// check make request
					if (isset($httpcode3) && $httpcode3 === 200) {
						//echo "Make request sent to create hubpot a/c"; 
						return  ['status' => true, 'curl_response' => $response];
					} else {
						//	echo "Oops! There're some error while sending Make request "; 
						return  ['status' => true, 'curl_response' => $response];
					}
				} else {
					return  ['status' => true, 'curl_response' => $response];
				}
        	 // Make request for hubspot a/c END


				// Send response to front-end for Onboarding
				//return  ['status'=>true, 'curl_response'=>$response];  // ENABLE if bookiply/holidu AND "Make request for hubspot a/c" OFF
			}
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	} // End of function 



	public function getPlanType($propertyType, $is_free)
	{	
		$getPlanAPIURL = $this->api . '/api/v3/payments/plans/?interval=MONTH&type=' . $propertyType . '&ip=' . $_SERVER['REMOTE_ADDR'];
		if($is_free){
			$getPlanAPIURL = $this->api . '/api/v3/payments/plans/?interval=MONTH&type=' . $propertyType . '&is_free=1&product=CHEKIN&ip=' . $_SERVER['REMOTE_ADDR'];
		}
		try {

			$curl = curl_init();
			curl_setopt_array($curl, array(
				//CURLOPT_URL => $this->api . '/api/v3/payments/plans/?interval=MONTH&type=' . $propertyType . '&ip=' . $_SERVER['REMOTE_ADDR'],
				//CURLOPT_URL => $this->api . '/api/v3/payments/plans/?interval=MONTH&type=' . $propertyType . '&is_free=1&product=CHEKIN&ip=' . $_SERVER['REMOTE_ADDR'],
				CURLOPT_URL => $getPlanAPIURL,
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
		} catch (Exception $ex) {
			throw new Exception($ex->getMessage());
		}
	} // End of function

	public function validateResharmonicsFirstStep()
	{

		$body = [
			'resharmonics_username' => isset($_POST['resharmonics_username']) ? $_POST['resharmonics_username'] : "",
			'resharmonics_password' => isset($_POST['resharmonics_password']) ? $_POST['resharmonics_password'] : ""
		];

		try {
			$curl = curl_init();

			curl_setopt_array($curl, array(
				// CURLOPT_URL => 'https://api-ng.chekintest.xyz/api/v3/resharmonics/users/validate-credentials/',
				CURLOPT_URL => 'https://a.chekin.io/api/v3/resharmonics/users/validate-credentials/',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => '',
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => 'POST',
				CURLOPT_POSTFIELDS => json_encode($body),
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json'
				),
			));

			$response = (array) json_decode(curl_exec($curl));
			curl_close($curl);
			return  $response;
			/*$status = isset($response['status']) ? $response['status']:"";
		if($status =='valid'){
			return true;
		}
		
		return false;*/
		} catch (Exception $ex) {
			throw new Exception($ex->getMessage());
		}
	} // End of function 



}


$c = new ChekinAPI($_POST, $forms);
$res = $c->processRequest();

echo json_encode($res);