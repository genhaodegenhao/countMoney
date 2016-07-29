<?php

//  get请求
	function httpGet($url){
		$cURL = curl_init();
		curl_setopt($cURL, CURLOPT_URL, $url);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($cURL);
		curl_close($cURL);
		return $response;
	}
	
//	post请求
	function httpPost($url,$postData){
		$cURL = curl_init();
		curl_setopt($cURL, CURLOPT_POST, true);
		curl_setopt($cURL, CURLOPT_URL, $url);
		curl_setopt($cURL, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($cURL);
		curl_close($cURL);
		return $response;
	}


?>






























