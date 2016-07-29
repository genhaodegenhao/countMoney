<?php
	session_start();
	include_once("config.php");
	include_once("url_request.php");
	include_once("getmessage.php");

//用户同意授权，获取code,通过code换取网页授权access_token
	$code = $_GET["code"];
	
	function get_access_token($code){
		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".appID."&secret=".appSecret."&code={$code}&grant_type=authorization_code";
		$response = httpGet($url);
		return $response;
	}
	$response = get_access_token($code);
	$obj = json_decode($response);
	$access_token = $obj->access_token;
	$openid = $obj->openid;

//	获取用户的信息
	function getUserInfo($access_token,$openid){
		$url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
		$response = httpGet($url);
		return $response;
	}
	
//把用户的openid保存起来
	$_SESSOIN['openid'] = '$openid';
	$userJsonStr = getUserInfo($access_token, $openid);
	if(isUserExists($openid) == false){
		insertMessage($userJsonStr);
	}
	echo "<script>window.location.href = 'weixin1.html'</script>";

?>