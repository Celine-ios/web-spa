<?php

/*
Curl Get User Test
curl -X POST -H "Content-Type: application/json" -d '{"site_id":"MLM"}' "https://api.mercadolibre.com/users/test_user?access_token="

Result

{
   "id":202871282,
   "nickname":"TETE4579711",
   "password":"qatest9667",
   "site_status":"active",
   "email":"test_user_93444889@testuser.com"
}
*/

if(!ini_get('date.timezone') ){
   date_default_timezone_set('America/Bogota');
}


return [

	/*
	* Para crear su client_id y client_secret
	* http://applications.mercadolibre.com
	*/

	'client_id' => env('ML_APP_ID', ''),
	'client_secret' => env('ML_APP_SECRET', ''),

	'urls' => [
		'API_ROOT_URL' => 'https://api.mercadolibre.com',
		'AUTH_URL'     => env('ML_AUTH_URL', 'http://auth.mercadolivre.com.br/authorization'),
		'OAUTH_URL'    => '/oauth/token'
	],

	'curl_opts' => [
		CURLOPT_USERAGENT => "MELI-PHP-SDK-1.0.0",
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_TIMEOUT => 60
	],
	/*
	 * Emails Config
	 */
	'notification_email' => env('ML_NOTIFICATION_EMAIL', ''),
	'notification_name' => env('ML_NOTIFICATION_NAME', ''),
	'notification_email_cc' => env('ML_NOTIFICATION_CC', ''),
	'notification_email_cc_name' => env('ML_NOTIFICATION_CC_NAME', ''),
	/*
	 * Log Config
	 */
	'path_log' => storage_path('mercadolibre/'),
	'file_log' => 'notifications_' . date(env('ML_LOG_FORMAT', 'Y_m_d')). '.log'
];
