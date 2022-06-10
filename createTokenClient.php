<?php

include 'FirebaseJWT/JWT.php';

use \Firebase\JWT\JWT;

/*
HEADER:
	{
	  "typ": "JWT",
	  "alg": "HS256",
	  "cty": "stringee-api;v=1"
	}

PAYLOAD:
	{
	  "jti": "SK...-1497503680",//JWT ID
	  "iss": "SK...",//API Key SID
	  "exp": 1497507280,//Expiration Time
	  "userId": "huydn-123456"
	}
*/

$apiKeySid = 'SKl1T9EHHVH0ozX5wpJtBNn6kVHleD7uWs';
$apiKeySecret = "cjZXbTBkN25uUWRqYlJidXpCMjRVUjJZYzltMWYzaHQ=";

$now = time();
$exp = $now + 3600000;

$user_id = @$_GET['user_id'];

if(!$user_id){
	$jwt = '';
}else {
	$header = array('cty' => "stringee-api;v=1");
	$payload = array(
	    "jti" => $apiKeySid . "-" . $now,
	    "iss" => $apiKeySid,
	    "exp" => $exp,
	    "userId" => $user_id
	);

	$jwt = JWT::encode($payload, $apiKeySecret, 'HS256', null, $header);
}



$res = array(
	'access_token' => $jwt
	);

header('Access-Control-Allow-Origin: *');
echo json_encode($res);





