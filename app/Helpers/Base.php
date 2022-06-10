<?php
namespace App\Helpers;
include 'agoraToken/AccessToken.php';
include 'FirebaseJWT/JWT.php';
use \Firebase\JWT\JWT;
use \agoraToken\AccessToken\AccessToken;
use Illuminate\Support\Str;
use DateTime;
use DateTimeZone;

class Base
{
	const RoleAttendee = 0;
    const RolePublisher = 1;
    const RoleSubscriber = 2;
    const RoleAdmin = 101;

	public static function get_agora_token($channelName = '7d72365eb983485397e3e3f9d460bdda' ){
		$appID = "9c0d2d39bcf24b80aebd09bbcb957ec1";
		$appCertificate = "fce875011e824d97b32cb88f6b599d55";
		// $channelName = "7d72365eb983485397e3e3f9d460bdda";
		$uid = 2882341273;
		$uidStr = "0";
		$role = Base::RoleAttendee;
		$expireTimeInSeconds = 3600;
		$currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
		$privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

		// $token = RtcTokenBuilder::buildTokenWithUid($appID, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
		// echo 'Token with int uid: ' . $token . PHP_EOL;

		$token = Base::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $uidStr, $role, $privilegeExpiredTs);
		return $token;
		// exit;
	}

	public static function buildTokenWithUserAccount($appID, $appCertificate, $channelName, $userAccount, $role, $privilegeExpireTs){
        $token = AccessToken::init($appID, $appCertificate, $channelName, $userAccount);
        $Privileges = AccessToken::Privileges;
        $token->addPrivilege($Privileges["kJoinChannel"], $privilegeExpireTs);
        if(($role == Base::RoleAttendee) ||
            ($role == Base::RolePublisher) ||
            ($role == Base::RoleAdmin))
        {
            $token->addPrivilege($Privileges["kPublishVideoStream"], $privilegeExpireTs);
            $token->addPrivilege($Privileges["kPublishAudioStream"], $privilegeExpireTs);
            $token->addPrivilege($Privileges["kPublishDataStream"], $privilegeExpireTs);
        }
        return $token->build();
    }

	public static function time_elapsed_string($datetime) {
		// echo Base::get_agora_token();

	    $string_result = $datetime->diffForHumans();
	    $string_result = str_replace('s', '', $string_result);
	    $string_result = str_replace('year', 'năm', $string_result);
	    $string_result = str_replace('month', 'tháng', $string_result);
	    $string_result = str_replace('week', 'tuần', $string_result);
	    $string_result = str_replace('day', 'ngày', $string_result);
	    $string_result = str_replace('hour', 'giờ', $string_result);
	    $string_result = str_replace('minute', 'phút', $string_result);
	    $string_result = str_replace('second', 'giây', $string_result);
	    $string_result = str_replace('ago', 'trước', $string_result);
	    $string_result = str_replace('just now', 'vừa xong', $string_result);
	    return $string_result;
	}
	public static function time_elapsed_string_old($datetime, $full = false) {

	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'năm',
	        'm' => 'tháng',
	        'w' => 'tuần',
	        'd' => 'ngày',
	        'h' => 'giờ',
	        'i' => 'phút',
	        's' => 'giây',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            // $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
	}
	public static function get_access_token($user_id){
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
		$exp = $now + 60*60*24*60;

		$username = ''.$user_id;//@$_GET['u'];

		if(!$username){
			$jwt = '';
		}else {
			$header = array('cty' => "stringee-api;v=1");
			$payload = array(
			    "jti" => $apiKeySid . "-" . $now,
			    "iss" => $apiKeySid,
			    "exp" => $exp,
			    "userId" => $username
			);

			$jwt = JWT::encode($payload, $apiKeySecret, 'HS256', null, $header);
		}

		$res = array(
			'access_token' => $jwt
		);
		return $res;
	}
}