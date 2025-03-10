<?php
	
	$domain = $_SERVER['SERVER_NAME'];
    $name=$_REQUEST['name'];
	$emailid=$_REQUEST['emailid'];
	$phone=$_REQUEST['phone'];
	//$user_message=$_REQUEST['message'];
	
	$URL = 'https://'.$domain.'/'.basename(__DIR__).'/' ;
	
	
	/*echo $name.'<br>';
	echo $emailid.'<br>';
	echo $phone.'<br>';
	
	die();
	*/
	if(!empty($emailid)){
		
		$message='<table border="0" cellpadding="3" cellspacing="3" style="max-width: 700px;"><tr><td  width="100"><b>NOMBRE</b></td><td><b>:</b></td><td>'.$name.'</td></tr><tr><td><b>EMAIL</b></td><td><b>:</b></td><td>'.$emailid.'</td></tr><tr><td valign="top"><b>TELÉFONO</b></td><td valign="top"><b>:</b></td><td>'.$phone.'</td></tr></table> <br> <br> <p style="font-size:12px;color:#999;">-- <br> Este email se envió desde el formulario de contacto de ('.$URL.')</p>';
		
		$subject='¡INSCRÍBETE Y CONSIGUE 50% DE DESCUENTO! | CheKin ';
		//$to='asmaulhq97@gmail.com';
		$to='julian@chekin.io ';
		
		$cc=''; 
		
		$from_name=$name;
		$from_mail='info@'.$domain;
		//$from_mail=$emailid;


		/*$headers  ='MIME-Version: 1.0' . "\r\n";
		$headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .="Reply-To:".$name. " < " .$emailid. ">\r\n";
		//$headers .="To:".$to."\r\n";
		$headers .="From: ".$from_name." <".$from_mail.">\r\n"; */

		$headers = "From: " .$from_name." <". strip_tags($from_mail) . ">\r\n";
		$headers .="Reply-To: ".$name. " <" .strip_tags($emailid). ">\r\n";
		$headers .= "CC: ".$cc."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();


		if(mail($to, $subject, $message, $headers)){ 
			echo "<div class='success'>";
			echo "<p>Thanks for your interest! We will get in touch with you shortly.</p>";
			echo "</div>";
		}else{
			echo "<p class='error'>Sorry! Can't send you're message.</p>";
		}
	
	}else{
			echo "Invalid request!";
	}
	
	
	



?>