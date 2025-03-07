<?php

$forms = [
//'API_END'=>'https://api-ng.chekintest.xyz',
'API_END'=>'https://a.chekin.io',
"Guesty"=>[
	"config"=>["path"=>"pms-integrations/guesty",
				"form_field"=>[ 
								//"api_key"=>"api_key",  //in future there must be 2 fields client secret and client id
								//"client_secret"=>"client_secret", 
								//"client_id"=>"client_id",
								"integration_token"=> "integration_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-Guesty "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client ID</label><input type="text" data-testid="input" name="api_key" placeholder="Client ID" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client Secret</label><input type="text" data-testid="input" name="client_id" placeholder="Client Secret" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Guesty</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>In a new browser tab, log into <a href="https://app.guesty.com/auth/login" target="_blank"><strong>Guesty</strong></a></p>
		</div>
		<div class="slide slide-2">
			<p>Go to the <a href="https://app.guesty.com/account/integrations/g/chekin?applicationId=5ca45f693608af06d75cc35f" target="_blank"><strong>CheKin Integration page</strong></a></p> 
			<p>Or, navigate to <br> <strong>MARKETPLACE &gt; CheKin &gt; CONNECT</strong></p>
		</div>
		<div class="slide slide-3">
			<p>Next to <strong>API token</strong>, click <strong>Copy to clipboard</strong></p> 
			<p>Empty API key box? <strong>Click Generate new key</strong></p>
		</div>
	'
], 
"365Villas"=>[
	"config"=>["path"=>"villas-365",
				"form_field"=>[
								"key_token"=>"key_token",
								"pass_token"=>"pass_token",
								"owner_token"=>"owner_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-365Villas"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">365villas API Key</label><input type="text" data-testid="input" name="key_token" placeholder="Enter API Key" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">365villas API Password </label><input type="text" data-testid="input" name="pass_token" placeholder="Enter API Password" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">365villas API Owner Token</label><input type="text" data-testid="input" name="owner_token" placeholder="Enter API Owner Token" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with 365Villas</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>In a new browser tab, log into <a href="https://secure.365villas.com/home/login" target="_blank">365Villas</a></p>
		</div>
		<div class="slide slide-2">
			<p>This can be found at Your account > <a href="https://secure.365villas.com/config/account/api" target="_blank">API Access</a></p>
		</div>
	',
	"helpInitiator" => 'Where are my API keys?'
], 
"365Villas_2"=>[
	"config"=>["path"=>"pms-integrations/villas365",
				"form_field"=>[
								"key_token"=>"key_token",
								"pass_token"=>"pass_token",
								"owner_token"=>"owner_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-365Villas"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">365villas API Key</label><input type="text" data-testid="input" name="key_token" placeholder="Enter API Key" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">365villas API Password </label><input type="text" data-testid="input" name="pass_token" placeholder="Enter API Password" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">365villas API Owner Token</label><input type="text" data-testid="input" name="owner_token" placeholder="Enter API Owner Token" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with 365Villas</button></div></div></div>
	',
	"help" => '
		<div class="slide slide-1">
			<p>In a new browser tab, log into <a href="https://secure.365villas.com/home/login" target="_blank">365Villas</a></p>
		</div>
		<div class="slide slide-2">
			<p>This can be found at Your account > <a href="https://secure.365villas.com/config/account/api" target="_blank">API Access</a></p>
		</div>
	',
	"helpInitiator" => 'Where are my API keys?'
], 

"Channex"=>[
	"config"=>["path"=>"channex",
				"form_field"=>[
								"channex_email"=>"channex_email",
								"channex_password"=>"channex_password",
								"core_email"=>"text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-channex"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Enter your Channex email</label><input type="text" data-testid="input" name="channex_email" placeholder="Email" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Enter your Channex password</label><input type="password" data-testid="input" name="channex_password" placeholder="Password" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Channex</button></div></div></div> 
	',

],

"Eviivo"=>[
	"config"=>["path"=>"eviivo",
				"form_field"=>[
								"client_secret"=>"client_secret",
								"client_id"=>"client_id",
								"shortnames"=>"shortnames",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-eviivo"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client secret</label><input type="text" data-testid="input" name="client_secret" placeholder="Enter Client secret" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client ID</label><input type="text" data-testid="input" name="client_id" placeholder="Enter Client ID" class="form-control" value=""></div></div><div class="multi-field-wrapper"> <div class="multi-fields"><div class="form-group shortnames multi-field"><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">Short name</label><input type="text" data-testid="input" name="shortnames[]" placeholder="Enter Short name" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">Add field</a></p></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Eviivo</button></div></div></div> 
	',
 
],
"Eviivo_2"=>[
	"config"=>["path"=>"pms-integrations/eviivo",
				"form_field"=>[
								"client_secret"=>"client_secret",
								"client_id"=>"client_id",
								//"shortnames"=>"shortnames",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-eviivo"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client secret</label><input type="text" data-testid="input" name="client_secret" placeholder="Enter Client secret" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client ID</label><input type="text" data-testid="input" name="client_id" placeholder="Enter Client ID" class="form-control" value=""></div></div><div class="multi-field-wrapper"> <div class="multi-fields"><div class="form-group shortnames multi-field"><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">Short name</label><input type="text" data-testid="input" name="shortnames[]" placeholder="Enter Short name" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">Add field</a></p></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Eviivo</button></div></div></div> 
	',
 
],
"Ezee"=>[
	"config"=>["path"=>"ezeetechnosys",
				"form_field"=>[
								"external_auth_key"=>"external_auth_key",
								"external_hotel_code"=>"external_hotel_code",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-ezee"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">External Auth Key</label><input type="text" data-testid="input" name="external_auth_key" placeholder="Enter text" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">External Hotel Code</label><input type="text" data-testid="input" name="external_hotel_code" placeholder="Enter text" class="form-control" value=""></div></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Ezee</button></div></div></div> 
	',

],
"Fantasticstay"=>[
	"config"=>["path"=>"fantasticstay",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-fantasticstay"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API token</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API token" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with FantasticStay</button></div></div></div> 
	',
],
"Hostaway"=>[
	"config"=>["path"=>"hostaway",
				"form_field"=>[
								"external_client_secret"=>"external_client_secret",
								"external_client_id"=>"external_client_id",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostaway"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Hostaway API secret key</label><input type="text" data-testid="input" name="external_client_secret" placeholder="Enter text" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Hostaway Account ID</label><input type="text" data-testid="input" name="external_client_id" placeholder="Enter text" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hostaway</button></div></div></div> 
	',
	"help" => '
		<div class="slide slide-1">
			<p>Log into your <a target="_blank" href="https://dashboard.hostaway.com/login" >Hostaway account.</a></p>
		</div>
		<div class="slide slide-2">
			<p>Select the \'Hostaway API\' tab under \'Setting\' from the menu on the left.</p>
		</div>
		<div class="slide slide-2">
			<p>If you don\'t remember your API secret key, generate a new one by pressing the \'Generate API secret key\' button. Copy and paste your \'API secret key\' and \'Account ID\' into the corresponding fields on the Chekin registration page.</p>
		</div>
	'
],
"Hostaway_2"=>[
    "config"=>["path"=>"pms-integrations/hostaway",
                "form_field"=>[
                                "client_secret"=>"external_client_secret",
                                "client_id"=>"external_client_id",
                                "email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
        <div class="form-custom form-hostaway"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Hostaway API secret key</label><input type="text" data-testid="input" name="external_client_secret" placeholder="Enter text" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Hostaway Account ID</label><input type="text" data-testid="input" name="external_client_id" placeholder="Enter text" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hostaway</button></div></div></div>
    ',
    "help" => '
        <div class="slide slide-1">
            <p>Log into your <a target="_blank" href="https://dashboard.hostaway.com/login" >Hostaway account.</a></p>
        </div>
        <div class="slide slide-2">
            <p>Select the \'Hostaway API\' tab under \'Setting\' from the menu on the left.</p>
        </div>
        <div class="slide slide-2">
            <p>If you don\'t remember your API secret key, generate a new one by pressing the \'Generate API secret key\' button. Copy and paste your \'API secret key\' and \'Account ID\' into the corresponding fields on the Chekin registration page.</p>
        </div>
    '
],
"Hostify"=>[
	"config"=>["path"=>"hostify",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostify"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API token</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API token" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hostify</button></div></div></div>
	',
	
],
"Hostify_2"=>[
	"config"=>["path"=>"pms-integrations/hostify",
				"form_field"=>[
								"api_key"=>"api_key",
								"core_email"=> "text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostify"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API token</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API token" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hostify</button></div></div></div>
	',
	
],
"Hoteliga"=>[
	"config"=>["path"=>"hoteliga",
				"form_field"=>[
								"external_username"=>"external_username",
								"external_password"=>"external_password",
								"external_domain"=>"external_domain",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hoteliga"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">External username</label><input type="text" data-testid="input" name="external_username" placeholder="Enter username" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">External password</label><input type="text" data-testid="input" name="external_password" placeholder="Enter password" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">External domain</label><input type="text" data-testid="input" name="external_domain" placeholder="Enter domain" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hoteliga</button></div></div></div>
	',
	
],

"Lodgify"=>[
	"config"=>["path"=>"pms-integrations/lodgify",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-lodgify"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API token</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API token" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Lodgify</button></div></div></div>
	',
	
],

"Mews"=>[
	"config"=>["path"=>"pms-integrations/mews",
				"form_field"=>[
								"access_token"=>"access_token",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-mews"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Access token</label><input type="text" data-testid="input" name="access_token" placeholder="Enter your Access token" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Mews</button></div></div></div>
	',
	
],

"Rentals United"=>[
	"config"=>["path"=>"rentals-united",
				"form_field"=>[
								"email"=>"email", // Both are email, commented one. 
								//"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentals-united"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Enter your Rentals United email</label><input type="text" data-testid="input" name="email" placeholder="Enter email" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Rentals United</button></div></div></div>
	',
	
],
"Rentals United_2"=>[
	"config"=>["path"=>"pms-integrations/rentals-united",
				"form_field"=>[
								"pms_email"=>"pms_email", 
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentals-united"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Enter your Rentals United email</label><input type="text" data-testid="input" name="pms_email" placeholder="Enter email" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Rentals United</button></div></div></div>
	',
	
],
"Rentlio"=>[
	"config"=>["path"=>"pms-integrations/rentlio", //rentlio
				"form_field"=>[
								"api_key"=>"api_token",  
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentlio"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API token</label><input type="text" data-testid="input" name="api_token" placeholder="Enter your API token" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Rentlio</button></div></div></div>
	',
	
],

"Resharmonics"=>[
	"config"=>["path"=>"resharmonics",
				"form_field"=>[
								"resharmonics_username"=>"resharmonics_username",  
								"core_email"=> "text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"resharmonics_username"=>"resharmonics_username",
								"resharmonics_password"=>"resharmonics_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields"><div class="from-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Username</label><input type="text" data-testid="input" name="resharmonics_username" placeholder="Enter username" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Resharmonics password</label><input type="password" data-testid="input" name="resharmonics_password" placeholder="Enter your Resharmonics password" class="form-control" value=""></div></div><div class="from-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Resharmonics</button></div></div></div>
	',
	
],


"Resharmonics_2"=>[
	"config"=>["path"=>"pms-integrations/resharmonics",
				"form_field"=>[
								//"resharmonics_username"=>"resharmonics_username",  
								"core_email"=> "text-gE8dLd",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"user_username"=>"resharmonics_username",
								"user_password"=>"resharmonics_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields"><div class="from-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Username</label><input type="text" data-testid="input" name="resharmonics_username" placeholder="Enter username" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Resharmonics password</label><input type="password" data-testid="input" name="resharmonics_password" placeholder="Enter your Resharmonics password" class="form-control" value=""></div></div><div class="from-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Resharmonics</button></div></div></div>
	',
	
],

//just redirect to: https://login.smoobu.com/en/integration/edit/5
"Smoobu"=>[
	
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields has-spacer"><div class="text-center form-group"><a href="https://login.smoobu.com/en/integration/edit/5" target="_blank" class="button" role="">Connect with Smoobu</a> </div></div></div>
	',
	"helptitle" => 'Setting you connection',
	"help" => '
		<div class="slide slide-1">
			<p>Click on <strong>"Connect with Smoobu".</strong> It will redirect you to CheKin connection on your Smoobu account</p>
		</div>
		<div class="slide slide-2">
			<p>Click on <strong>"Connect".</strong> We will send you an email with your CheKin password</p>
		</div>
		<div class="slide slide-3">
			<p><a href="https://dashboard.chekin.com/login" target="_blank">Login in CheKin.</a></p>
		</div>

	',
	"helpInitiator" => 'How to connect?'
],

//just redirect to: https://www.planyo.com/extensions/extension.php?id=129&origin=chekin
"Planyo"=>[
	
	"form"=>'
		<div class="form-custom form-resharmonics"><div class="form-fields has-spacer"><div class="text-center form-group"><a href="https://www.planyo.com/extensions/extension.php?id=129&origin=chekin" target="_blank" class="button" role="">Connect with Planyo</a></div></div></div>
	',
	"helptitle" => 'Setting you connection',
	"help" => '
		<div class="slide slide-1">
			<p>Once you are redirected to Planyo you will land on the Chekin integration page within Planyo. You may need to log in first</p>
		</div>
		<div class="slide slide-2">
			<p>Move down and click \'Buy as subscription\' button to add the extension to your account</p>
		</div>
		<div class="slide slide-3">
			<p>Then, create a new Chekin account or connect the existing one and proceed to the Chekin dashboard to connect your properties</p>
		</div>

	',
	"helpInitiator" => 'How to connect?'
],

"Apaleo"=>[
	"config"=>["path"=>"apaleo",
		"form_field"=>[
						//"access_token"=>"access_token",  
						//"core_email"=> "text-gE8dLd",
						"code"=> "oauth_code",
						"subscription_type"=>"field-aD7ucdKDH7uqiq3",
						"email"=> "text-gE8dLd",
						//"email"=>"email",
						"password"=>"text-1hJwzr",
						//"password"=>"api_password",
						//"access_token"=>"access_token",
						"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
					]
	],
	"form"=>'
		<div class="form-custom form-apaleo "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control" value=""></div></div><div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Apaleo</button></div></div></div>
	',
	
],
"Apaleo_2"=>[
	"config"=>["path"=>"pms-integrations/apaleo",
		"form_field"=>[
						//"access_token"=>"access_token",  
						//"core_email"=> "text-gE8dLd",
						"api_key"=> "oauth_code",
						"subscription_type"=>"field-aD7ucdKDH7uqiq3",
						"email"=> "text-gE8dLd",
						//"email"=>"email",
						"password"=>"text-1hJwzr",
						//"password"=>"api_password",
						//"access_token"=>"access_token",
						"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
					]
	],
	"form"=>'
		<div class="form-custom form-apaleo-2 "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control" value=""></div></div><div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Apaleo</button></div></div></div>
	',
	
],
"BookingSync"=>[
	"config"=>["path"=>"bookingsync",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								"code"=>"oauth_code",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-bookingsync "><div class="form-fields"><input type="hidden" data-testid="input" name="access_token" placeholder="Access Token" class="form-control is-valid" value="2a6bb99a828ce721df0f63c21cd970b44364161d201c4590df12e44e1a1e5cf5" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with BookingSync</button></div></div></div>
	',
	
],
"BookingSync_2"=>[ 
	"config"=>["path"=>"pms-integrations/bookingsync",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								"code"=>"oauth_code",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-bookingsync "><div class="form-fields"><input type="hidden" data-testid="input" name="access_token" placeholder="Access Token" class="form-control is-valid" value="2a6bb99a828ce721df0f63c21cd970b44364161d201c4590df12e44e1a1e5cf5" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with BookingSync</button></div></div></div>
	',
	
],
/*"Cloudbeds"=>[
	"config"=>["path"=>"cloudbeds",
				"form_field"=>[
								"access_token"=>"oauth_code",  
								"code"=>"oauth_code",  
								"core_email"=> "text-gE8dLd",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								//"are_tokens_refetch"=>"are_tokens_refetch", 
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-cloudbeds "><div class="form-fields"><input type="hidden" data-testid="input" name="are_tokens_refetch" placeholder="" class="form-control is-valid" value="false" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Cloudbeds</button></div></div></div>
	',
	
],*/

// TESTING >> Cloudbeds || Deleted TESTING from the PMS list in front-end
"Cloudbeds"=>[
	"config"=>["path"=>"pms-integrations/cloudbeds",
				"form_field"=>[
								"access_token"=>"oauth_code",  
								"code"=>"oauth_code",  
								"core_email"=> "text-gE8dLd",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								//"are_tokens_refetch"=>"are_tokens_refetch", 
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-cloudbeds "><div class="form-fields"><input type="hidden" data-testid="input" name="are_tokens_refetch" placeholder="" class="form-control is-valid" value="false" autocomplete="off"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Cloudbeds</button></div></div></div>
	',
	
],

"Myvr"=>[
	"config"=>["path"=>"myvr",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"code"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-myvr "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Myvr</button></div></div></div>
	',
	
],

"Ownerrez"=>[
	"config"=>["path"=>"ownerrez",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"code"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-ownerrez "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Ownerrez</button></div></div></div>
	',
	
],

"Octorate"=>[
	"config"=>["path"=>"octorate",
				"form_field"=>[
								//"access_token"=>"access_token",  
								"core_email"=> "text-gE8dLd",
								"api_key"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								//"access_token"=>"access_token",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-octorate "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Octorate</button></div></div></div>
	',
	
],
"Octorate_2"=>[
    "config"=>["path"=>"pms-integrations/octorate",
                "form_field"=>[
                                //"access_token"=>"access_token",
                                "core_email"=> "text-gE8dLd",
                                "api_key"=> "oauth_code",
                                "subscription_type"=>"field-aD7ucdKDH7uqiq3",
                                "email"=> "text-gE8dLd",
                                //"email"=>"email",
                                "password"=>"text-1hJwzr",
                                //"password"=>"api_password",
                                //"access_token"=>"access_token",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    
    "form"=>'
        <div class="form-custom form-octorate "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
        <div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Octorate</button></div></div></div>
    ',
    
],
"Booking"=>[
	"config"=>["path"=>"pms-integrations/booking-2",
				"form_field"=>[ 
								"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-booking "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Booking</button></div></div></div>
	',
	
],
"Booking_2"=>[
	"config"=>["path"=>"pms-integrations/booking",
				"form_field"=>[ 
								"core_email"=> "text-gE8dLd",
								"access_token"=> "oauth_code",
								"subscription_type"=>"field-aD7ucdKDH7uqiq3",
								"email"=> "text-gE8dLd",
								//"email"=>"email",
								"password"=>"text-1hJwzr",
								//"password"=>"api_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	"form"=>'
		<div class="form-custom form-booking "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
		<div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Booking</button></div></div></div>
	',
	
],
/*"Bookipro"=>[
	"config"=>["path"=>"bookipro",
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-bookipro "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API key" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Bookipro</button></div></div></div> 
	',
	"help" => ''
],
*/
"Bookipro"=>[
    "config"=>["path"=>"bookipro",
                "form_field"=>[
                                "api_key"=>"api_key",
                                "host"=>"host",
                                "email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                                ]
            ],
    "form"=>'
        <div class="form-custom form-bookipro "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API key" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Bookipro</button></div></div></div>
    ',
    "help" => ''
],
"Bookipro_2"=>[
    "config"=>["path"=>"pms-integrations/bookipro",
                "form_field"=>[
                                "api_key"=>"api_key",
                                "host"=>"host",
                                "email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                                ]
            ],
    "form"=>'
        <div class="form-custom form-bookipro "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="Enter your API key" class="form-control" value=""></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Bookipro</button></div></div></div>
    ',
    "help" => ''
],
/*"Ulyses"=>[
	"config"=>["path"=>"ulyses",
				"form_field"=>[
								
								//"client_username"=>"client_username",
								//"client_password"=>"client_password",
								"user_domain"=>"user_domain",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-ulyses "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Ulyses account domain:</label><input type="text" name="user_domain" placeholder="Enter your domain" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Conectar con Ulyses</button></div></div></div>
	',
	"help" => ''
],*/
"Ulyses"=>[
	"config"=>["path"=>"pms-integrations/ulyses",
				"form_field"=>[
								
								//"client_username"=>"client_username",
								//"client_password"=>"client_password",
								"user_domain"=>"user_domain",
								"pms_password"=>"pms_password",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
								]
			],
	"form"=>'
		<div class="form-custom form-ulyses "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Dominio de la cuenta de Ulyses:</label><input type="text" name="user_domain" placeholder="Introduce el dominio" class="form-control" value=""></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API Password</label><input type="text" name="pms_password" placeholder="API Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Conectar con Ulyses</button></div></div></div>
	',
	"help" => ''
],
"Deskline"=>[
	"config"=>["path"=>"pms-integrations/deskline", 
				"form_field"=>[
								//"client_secret"=>"client_secret",
								//"client_id"=>"client_id",
								"housings_ids"=>"housings_ids",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-deskline"><div class="form-fields"><div class="sc-kNZoFW drYvvf"><div class="multi-field-wrapper"> <div class="multi-fields"><div class="form-group housings_ids multi-field"><div class="sc-qXhiz cvmVKB field"><label class="sc-pItiW PQBAt">Hotel Code</label><input type="text" data-testid="input" name="housings_ids[]" placeholder="Enter Hotel Code" class="form-control" value=""></div><a href="javascript:void(0)" class="remove-field">X</a></div></div><p class=" mt-0 mb-0"><a class="add-field" href="javascript:void(0)">Add field</a></p></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Deskline</button></div></div></div>
	',
 
],

"Lavanda"=>[
	"config"=>["path"=>"pms-integrations/lavanda", 
				"form_field"=>[
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-lavanda "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="Introduce tu API" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Lavanda</button></div></div></div>
	',
 
],
"Avantio"=>[
	"config"=>["path"=>"pms-integrations/avantio", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-avantio "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="Introduce tu API" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Avantio</button></div></div></div>
	',
 
],
"Verial"=>[
	"config"=>["path"=>"pms-integrations/verial", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"user_dns"=>"user_dns",
								"session_nu"=>"session_nu",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-verial "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">User dns</label><input type="text" data-testid="input" name="user_dns" placeholder="User dns" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Session nu</label><input type="text" data-testid="input" name="session_nu" placeholder="Session nu" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Verial</button></div></div></div>
	',
 
],


"Tommy"=>[
	"config"=>["path"=>"pms-integrations/tommy", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								"api_key"=>"api_key",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-tommy "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">TommyBS username</label><input type="text" data-testid="input" name="pms_username" placeholder="Username" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">TommyBS password</label><input type="text" data-testid="input" name="pms_password" placeholder="Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API Key</label><input type="text" data-testid="input" name="api_key" placeholder="API Key" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Tommy BS</button></div></div></div>
	',
 
],
"Hostfully"=>[
	"config"=>["path"=>"pms-integrations/hostfully", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"agency_uid"=>"api_key",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-hostfully "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Agency UID</label><input type="text" data-testid="input" name="api_key" placeholder="Agency UID" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hostfully</button></div></div></div>
	',
 
],

"Hostfully_2"=>[
    "config"=>["path"=>"pms-integrations/hostfully",
                "form_field"=>[
                                //"access_token"=>"access_token",
                                "core_email"=> "text-gE8dLd",
                                "api_key"=> "oauth_code",
                                "subscription_type"=>"field-aD7ucdKDH7uqiq3",
                                "email"=> "text-gE8dLd",
                                //"email"=>"email",
                                "password"=>"text-1hJwzr",
                                //"password"=>"api_password",
                                //"access_token"=>"access_token",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    
    "form"=>'
        <div class="form-custom form-octorate "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control is-valid" value=""></div></div>
        <div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with Hostfully</button></div></div></div>
    ',
    
],

"avaibook"=>[
	"config"=>["path"=>"pms-integrations/avaibook", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"api_key"=>"api_key",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-avaibook "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="API key" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Avaibook</button></div></div></div>
	',
 
],
"Track"=>[
	"config"=>["path"=>"pms-integrations/track", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"sub_domain"=>"sub_domain",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-track "><div class="form-fields">
		<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Sub domain</label><input type="text" data-testid="input" name="sub_domain" placeholder="Enter sub domain" class="form-control" value="" autocomplete="off"></div> <div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">PMS username</label><input type="text" data-testid="input" name="pms_username" placeholder="Introduce el external username" class="form-control" value="" autocomplete="off"></div> <div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">PMS password</label><input type="text" data-testid="input" name="pms_password" placeholder=" Introduce la external password" class="form-control" value="" autocomplete="off"></div>
		<div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with track</button></div></div></div>
	</div></div></div>
	',
 
],
"minihotel"=>[
	"config"=>["path"=>"pms-integrations/minihotel", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"hotel_id"=>"hotel_id",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
	<div class="form-custom form-minihotel "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Hotel ID</label><input type="text" data-testid="input" name="hotel_id" placeholder="Enter hotel id" class="form-control" value="" autocomplete="off"></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Minihotel</button></div></div></div>
	</div>
	',
	
 
],
"Noray"=>[
	"config"=>["path"=>"pms-integrations/noray", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"client_id"=>"client_id",
								"client_secret"=>"client_secret",
								"tenant_id"=>"tenant_id",
								"environment"=> "environment",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
	<div class="form-custom form-noray "><div class="form-fields">
	<div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client id</label><input type="text" data-testid="input" name="client_id" placeholder="Enter client id" class="form-control" value="" autocomplete="off"></div> </div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Client secret</label><input type="text" data-testid="input" name="client_secret" placeholder="Enter client secret" class="form-control" value="" autocomplete="off"></div></div> <div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Tenant id</label><input type="text" data-testid="input" name="tenant_id" placeholder="Enter tenant id" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Environment</label><input type="text" data-testid="input" name="environment" placeholder="Enter environment" class="form-control" value="" autocomplete="off"></div></div>
	<div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with noray</button></div></div></div>
	',
 
],
'Noray_2' =>[
	"config"=>["path"=>"pms-integrations/noray", 
	"form_field"=>[
					
					"email"=> "text-gE8dLd",
					"password"=>"text-1hJwzr",
					"pms_email" => "text-gE8dLd",
					"pms_account_type"=> "pms_account_type",
					/*"protocol"=>"protocol",
					"host"=>"host",
					"port"=>"port",
					"business_central_version"=>"business_central_version",
					"basic_username"=> "basic_username",
					"basic_password"=> "basic_password",*/
					"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
				]
],
	"form"=>'<div class="form-custom form-noray " >
    <div class="form-fields" >
        <div class="form-group" >
            <div class="sc-qXhiz cvmVKB" >
                <label class="sc-pItiW PQBAt">IP</label>
                <input type="text" data-testid="input" name="host" placeholder="Enter IP" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        <div class="form-group" >
            <div class="sc-qXhiz cvmVKB" >
                <label class="sc-pItiW PQBAt">Port</label>
                <input type="text" data-testid="input" name="port" placeholder="Enter Port" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        <div class="form-group" >
            <div class="sc-qXhiz cvmVKB" >
                <label class="sc-pItiW PQBAt">Business central version</label>
                <input type="text" data-testid="input" name="business_central_version" placeholder="Enter business central version" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        <div class="form-group" >
            <div class="sc-qXhiz cvmVKB" >
                <label class="sc-pItiW PQBAt">Auth Type</label>
                <select name="pms_account_type" class="form-control js-example-basic-single is-valid">
					<option value="" selected="">Select</option>
                    <option value="oauth">OAuth</option>
                    <option value="basic_auth">Basic Auth</option>
                </select>
            </div>
        </div>
		<div class="type-basic-oauth d-none"  style="display: none;">
			<div class="form-group" >
				<div class="sc-qXhiz cvmVKB" >
					<label class="sc-pItiW PQBAt">Username</label>
					<input type="text" data-testid="input" name="basic_username" placeholder="Enter username" class="form-control" value="" autocomplete="off">
				</div>
			</div>
			<div class="form-group" >
				<div class="sc-qXhiz cvmVKB" >
					<label class="sc-pItiW PQBAt">Password</label>
					<input type="text" data-testid="input" name="basic_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off">
				</div>
			</div>

			<div class="form-group" >
				<button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with noray</button>
			</div>
		</div>
        <div class="form-group type-oauth"  style="">
		<button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with noray</button>
		
        </div>
	
    </div>
</div>
	',
	
], 
"Sihot"=>[
	"config"=>["path"=>"pms-integrations/sihot", 
				"form_field"=>[
								
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"pms_username"=>"pms_username",
								"pms_password"=>"pms_password",
								//"pms_provider"=>"pms_provider",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							] 
			],
	"form"=>'
	<div class="form-custom form-sihot "><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Sihot username</label><input type="text" data-testid="input" name="pms_username" placeholder="Enter username" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Sihot password</label><input type="password" data-testid="input" name="pms_password" placeholder="Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Sihot</button></div></div></div>
	</div>
	',
	
],
"Oracle"=>[
	"config"=>["path"=>"pms-integrations/oracle",
				"form_field"=>[
								"core_email"=> "text-gE8dLd",
								"user_username"=>"user_username",
								"user_password"=>"user_password",
								"base_url" => "base_url",
								//"hotels_id"=>"hotels_id", //It's moved to formAction.php #295 and converted the array introng seperated by commas.
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
	<div class="form-custom form-oracle""><div class="form-fields""><div class="form-group""><div class="sc-qXhiz cvmVKB""><label class="sc-pItiW PQBAt">User username</label><input type="text" data-testid="input" name="user_username" placeholder="Enter user username" class="form-control" value=""></div></div><div class="form-group""><div class="sc-qXhiz cvmVKB""><label class="sc-pItiW PQBAt">User password </label><input type="text" data-testid="input" name="user_password" placeholder="Enter user password" class="form-control" value=""></div></div><div class="form-group""><div class="sc-qXhiz cvmVKB""><label class="sc-pItiW PQBAt">Hotels id</label><input type="text" data-testid="input" name="hotels_id" placeholder="Enter hotels id" class="form-control" value="" autocomplete="off"></div></div><div class="form-group""><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Oracle</button></div></div></div>
	',
 
], 
"RENTALWISE"=>[
	"config"=>["path"=>"pms-integrations/rentalwise",
				"form_field"=>[
								//"core_email"=> "text-gE8dLd",
					
								"api_key"=>"api_key",
								"email"=> "text-gE8dLd",
								"password"=>"text-1hJwzr",
								//"phone"=>"field-c2xENTMAvcqpurK-intl",
								"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	"form"=>'
		<div class="form-custom form-rentalwise"><div class="form-fields"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">API key</label><input type="text" data-testid="input" name="api_key" placeholder="Enter API key" class="form-control" value=""></div></div
		
	
		
		<div class="form-group"><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Rentalwise</button></div></div></div>
	',
	"logo" => 'https://chekin.com/onboarding/wp-content/uploads/2024/06/rentalwise.svg'
],

"IGMS"=>[
	"config"=>["path"=>"pms-integrations/igms",
		"form_field"=>[
						//"access_token"=>"access_token",  
						//"core_email"=> "text-gE8dLd",
						"api_key"=> "oauth_code",
						"subscription_type"=>"field-aD7ucdKDH7uqiq3",
						"email"=> "text-gE8dLd",
						//"email"=>"email",
						"password"=>"text-1hJwzr",
						//"password"=>"api_password",
						//"access_token"=>"access_token",
						"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
					]
	],
	"form"=>'
		<div class="form-custom form-igms "><div class="form-fields"><div class="form-group screen-reader-text"><div class="sc-qXhiz cvmVKB"><div class="sc-pItiW PQBAt">Email</div><input type="text" data-testid="input" name="email" id="email-oauth" placeholder="Enter your email" class="form-control" value=""></div></div><div class="is-oauth screen-reader-text"><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Password </label><input type="password" data-testid="input" name="api_password" placeholder="Enter Password" class="form-control" value="" autocomplete="off"></div></div><div class="form-group"><div class="sc-qXhiz cvmVKB"><label class="sc-pItiW PQBAt">Confirm Password</label><input type="password" data-testid="input" name="api_password_confirm" placeholder="Confirm Password" class="form-control" value="" autocomplete="off"></div></div></div><div class="form-group"><button type="button" class="sc-jybekq kCpsjP custom-sync_0 btn-oauth" role="">Connect with IGMS</button></div></div></div>
	',
	
],

"Hotelizer"=>[
    "config"=>["path"=>"pms-integrations/hotelizer",
                "form_field"=>[
                                "user_username"=>"user_username",
                                "user_password"=>"user_password",
                                "email"=> "text-gE8dLd",
								"core_email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
	<div class="customSyncForm" id="customSyncForm" >
	<div class="form-custom form-hotelizer" ><div class="form-fields" ><div class="form-group" ><div class="sc-qXhiz cvmVKB" ><label class="sc-pItiW PQBAt">Hotelizer Username</label><input type="text" data-testid="input" name="user_username" placeholder="Enter Username" class="form-control" value="" autocomplete="off"></div></div><div class="form-group" ><div class="sc-qXhiz cvmVKB" ><label class="sc-pItiW PQBAt">Hotelizer Password</label><input type="text" data-testid="input" name="user_password" placeholder="Enter Password" class="form-control" value=""></div></div><div class="form-group" ><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hotelizer</button></div></div></div>
</div>    ',
   
],

"Hospitable"=>[ 
	"config"=>["path"=>"pms-integrations/hospitable",
				"form_field"=>[
							//"access_token"=>"access_token",  
							"core_email"=> "text-gE8dLd",
							"access_token"=> "oauth_code",
							"email"=> "text-gE8dLd",
							//"email"=>"email",
							"password"=>"text-1hJwzr",
							//"phone"=>"field-c2xENTMAvcqpurK-intl",
							//"password"=>"api_password",
							//"access_token"=>"access_token",
							"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
							]
			],
	
	 
],

"Avalon"=>[
    "config"=>["path"=>"pms-integrations/avalon",
                "form_field"=>[
								"x_api_key"=>"x_api_key",
								"base_url"=>"base_url",
								"hotel_name" => "hotel_name",
                                "email"=> "text-gE8dLd",
								"core_email"=> "text-gE8dLd",
                                "password"=>"text-1hJwzr",
                                "estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
                            ]
            ],
    "form"=>'
	<div class="customSyncForm" id="customSyncForm" >
	<div class="form-custom form-hotelizer" ><div class="form-fields" ><div class="form-group" ><div class="sc-qXhiz cvmVKB" ><label class="sc-pItiW PQBAt">Hotelizer Username</label><input type="text" data-testid="input" name="user_username" placeholder="Enter Username" class="form-control" value="" autocomplete="off"></div></div><div class="form-group" ><div class="sc-qXhiz cvmVKB" ><label class="sc-pItiW PQBAt">Hotelizer Password</label><input type="text" data-testid="input" name="user_password" placeholder="Enter Password" class="form-control" value=""></div></div><div class="form-group" ><button type="submit" class="sc-kehdeE eujTnD custom-sync" role="">Connect with Hotelizer</button></div></div></div>
</div>    ',
   
],

"FRONT2GO"=>[
    "config"=>["path"=>"pms-integrations/front2go",
				"form_field"=>[
					"host"=>"host",
					"chain_id"=>"chain_id",
					"user_password" => "user_password",
					"email"=> "text-gE8dLd",
					"core_email"=> "text-gE8dLd",
					"password"=>"text-1hJwzr",
					"estimated_range_of_managed_properties"=>"field-UQwb7oDM9q4lihb"
				]
            ],
   
],


];