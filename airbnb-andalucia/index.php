<?php
header('Location: https://chekin.com/');
exit;
// This is just an example. In application this will come from Javascript (via an AJAX or something)
$timezone_offset_minutes = 330;  // $_GET['timezone_offset_minutes']

// Convert minutes to seconds
$timezone_name = timezone_name_from_abbr("", $timezone_offset_minutes*60, false);
//echo $timezone_name;

date_default_timezone_set($timezone_name);

function countDown($date1, $date2)
	{		
		$date1=strtotime($date1);
		$date2=strtotime($date2); 
		$diff = abs($date1 - $date2);
		
		$day = $diff/(60*60*24); // in day
		$dayFix = floor($day);
		$dayPen = $day - $dayFix;
		if($dayPen > 0)
		{
			$hour = $dayPen*(24); // in hour (1 day = 24 hour)
			$hourFix = floor($hour);
			$hourPen = $hour - $hourFix;
			if($hourPen > 0)
			{
				$min = $hourPen*(60); // in hour (1 hour = 60 min)
				$minFix = floor($min);
				$minPen = $min - $minFix;
				if($minPen > 0)
				{
					$sec = $minPen*(60); // in sec (1 min = 60 sec)
					$secFix = floor($sec);
				}
			}
		}
		$str = "";
		if($dayFix >= 0)
			$str.= '<span class="item days">'.sprintf("%02d", $dayFix).'<small>días</small></span> : ';
		if($hourFix >= 0)
			$str.= '<span class="item hours">'.sprintf("%02d", $hourFix).'<small>horas</small></span> : ';
		if($minFix >= 0)
			$str.= '<span class="item minutes">'.sprintf("%02d",$minFix).'<small>minutos</small></span> : ';
		if($secFix >= 0)
			$str.= '<span class="item seconds">'.sprintf("%02d",$secFix).'<small>segundos</small></span>';
		return $str;
	}
	
	
?>

<!doctype html>
<html lang="es-ES">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>CheKin | No dejes que te eliminen de Airbnb el 30/09</title>
      <meta name="robots" content="index">
      <meta description="Si eres propietario de un alojamiento en Andalucía y lo publicitas en Airbnb, tienes hasta el 30 de septiembre para incluir su número de registro en el perfil de tu propiedad." />
      <link rel="canonical" href="https://chekin.io/airbnb-andalucia/" />


		<!-- Google Tag Manager -->
		<style>.async-hide { opacity: 0 !important} </style>
		<script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
			h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
			(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
			})(window,document.documentElement,'async-hide','dataLayer',4000,
			{'GTM-N3MLT5Z':true});</script>
		<script>
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-N9L49GJ');
		</script>
		<!-- End Google Tag Manager -->

	<meta property="fb:app_id" content="1145188438952294">
	<meta property="og:description" content="Si eres propietario de un alojamiento en Andalucía y lo publicitas en Airbnb, tienes hasta el 30 de septiembre para incluir su número de registro en el perfil de tu propiedad.">
	<meta property="og:image" content="https://chekin.io/airbnb-andalucia/images/facebookcard.jpg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="628">
	<meta property="og:site_name" content="CheKin">
	<meta property="og:title" content="CheKin | No dejes que te eliminen de Airbnb el 30/09">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://chekin.io/airbnb-andalucia/">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@chekinapp">
	<meta name="twitter:creator" content="@chekinapp">
	<meta name="twitter:title" content="CheKin | No dejes que te eliminen de Airbnb el 30/09">
	<meta name="twitter:description" content="Si eres propietario de un alojamiento en Andalucía y lo publicitas en Airbnb, tienes hasta el 30 de septiembre para incluir su número de registro en el perfil de tu propiedad.">
	<meta name="twitter:image" content="https://chekin.io/airbnb-andalucia/images/facebookcard.jpg">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900,900i" rel="stylesheet">
      <link rel='stylesheet'  href='https://chekin.io/wp-includes/css/dashicons.min.css' type='text/css' media='all' />
      <link rel="stylesheet" href="css/style.css?v=1.0">
      <link rel="icon"  type="image/png" href="images/favicon.png">
      <link rel="icon" href="images/favicon.png" sizes="32x32" />
      <link rel="icon" href="images/favicon.png" sizes="192x192" />
      <link rel="apple-touch-icon-precomposed" href="images/favicon.png" />

   </head>
   <body class="home">
   	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9L49GJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->	
      <header id="masthead" class="site-header" role="banner">
         <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl navbar-dark fixed-top bg-primary">
            <div class="container">
               <div class="navbar-brand">
                  <a href="https://chekin.io" class="custom-logo-link" rel="home" itemprop="url"><img width="161" height="29" src="images/logo.png" class="custom-logo" alt="CheKin" itemprop="logo"></a>			 
                  <a href="https://chekin.io" class="bloginfo screen-reader-text" rel="home">CheKin</a> 
               </div>
            </div>
         </nav>
         <!-- #site-navigation -->
      </header>
      <div id="content" class="site-content pt-5 pb-5">
		<section class="pt-5 banner main snaptoHeader text-center">
            <div class="container panel-grid-cell">
              <div class="row steps mt-lg-5">
			  <div class="col-12 col-xl-10 mx-auto mb-3">
			  <p class="countDown pb-lg-4 pt-xl-3 mb-xl-5 opacity1" id="countDown">
				
				<?php
					echo countDown(date('Y-m-d H:i:s'), "2018-09-30 00:00:00");
				?>
				<!--<span class="item days">00<small>días</small></span> : 
				  <span class="item hours">00<small>horas</small></span> : 
				  <span class="item minutes">00<small>minutos</small></span> : 
				  <span class="item seconds">00<small>segundos</small></span>-->
			  </p>
			  
				<h1>¡Date prisa!</h1>
				<p class="lead2">Si eres propietario de un alojamiento en Andalucía y lo publicitas en Airbnb, tienes hasta el 30 de septiembre para incluir su número de registro en el perfil de tu propiedad.</p>
				<p class="lead2">Si no lo haces, <strong class="highlight">tu vivienda quedará desactivada en Airbnb.</strong></p>
			</div>	
			</div>	
				<div class="row steps mt-lg-5">
					<div class="col-12 col-md-4">
						<a href="https://chekin.io/blog/airbnb-excluir-viviendas-turisticas-no-registradas-andalucia/" target="_blank" class="panel h3 bg-purple">
							Infórmate con nuestra entrada del blog 
							<span class="dashicons dashicons-arrow-down-alt2 mt-4"></span>
						</a>
					</div>
					<div class="col-12 col-md-4">
						<a href="https://ws072.juntadeandalucia.es/ofvirtual/auth/loginjs?procedimiento=6&conCertificado=0" target="_blank" class="panel h3 bg-blue">
							Registra tu vivienda en la Junta de Andalucía 
							<span class="dashicons dashicons-arrow-down-alt2 mt-4"></span>
						</a>
					</div>
					<div class="col-12 col-md-4">
						<a href="https://app.chekin.io/descargar?utm_medium=ppc&utm_source=web-landing-airbnb-30-09&utm_campaign=airbnb-andalucia-30-09" target="_blank" class="panel h3 bg-orange">
							Registra a tus huéspedes de forma fácil, segura y legal con la app de CheKin
							<span class="dashicons dashicons-arrow-down-alt2 mt-4"></span>
						</a>
					</div>
				</div>
            </div>
         </section>
         <section class="section banner app snaptoFooter">
            <div class="container">
               <div class="text-center">
                  <h2 class="text-white mb-5 pb-3 pb-xl-5">¡DESCARGA LA APP  DE CHEKIN Y PRUÉBALA GRATIS!</h2>
               </div>
               <div class="row ">
                  <div class="col-md-7 col-header-txt mb-5 mb-lg-0">
					<ul class="bullet">
						<li>Check-in móvil y registro de viajeros en 2 minutos</li>
						<li>Da de alta todos los alojamientos que necesites</li>
						<li>Check-ins ilimitados</li>
						<li>Lectura automática de DNI y pasaportes de hasta 150 países</li>
						<li>Recogida de firmas y elaboración partes de entrada</li>
						<li>Envío de datos a Policía, Guardia Civil, Mossos, Ertzaintza</li>
						<li>Almacenamiento seguro de documentos en la nube</li>
						<li>Una sola cuenta para todos los dispositivos</li>
						<li>Un número de colaboradores ilimitado</li>
						<li>Soporte a través de e-mail, chat o teléfono</li>
					</ul>
                     <div id="panel-10-0-0-1" class="so-panel widget widget_sow-button mb-4 mt-4" data-index="1">
                        <div class="btn-cont btn-primary-cont downloadApp panel-widget-style panel-widget-style-for-10-0-0-1">
                           <div class="so-widget-sow-button so-widget-sow-button-atom-4a75a8acc3b6">
                              <div class="ow-button-base ow-button-align-center">
                                 <a href="https://app.chekin.io/descargar?utm_medium=ppc&utm_source=web-landing-airbnb-30-09&utm_campaign=airbnb-andalucia-30-09" class="ow-icon-placement-left ow-button-hover" target="_blank">
                                 <span>DESCARGA LA APP</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix text-center rating">
                        <div class="chekin-star-ratings">
                           <ul>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                           </ul>
                           <p>App Store</p>
                        </div>
                        <div class="chekin-star-ratings">
                           <ul>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-filled"></li>
                              <li class="dashicons dashicons-star-half"></li>
                           </ul>
                           <p>Play Store</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 col-header-img">
                     <img src="images/screenshot.png" alt="header-img" width="880" height="580" class="img-header-lg">                            
                  </div>
               </div>
            </div>
         </section>

      </div>
	  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      <script src="js/custom.js?v=1.0"></script>
	  
	  <script>
  var APP_ID = "qngfmf4n";

 window.intercomSettings = {
    app_id: APP_ID
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/APP_ID';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>

   </body>
</html>