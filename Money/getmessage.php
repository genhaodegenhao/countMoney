<?php

//向数据库中插入数据
	function insertMessage($userJsonStr){
		$user = json_decode($userJsonStr);
		
		$openid = $user->openid;
		$nickname = $user->nickname;
		$sex = $user->sex ? "男":"女";
		$city = $user->city;
		$province  = $user->province;
		$country = $user->country;
		$headimgurl = $user->headimgurl;
		
		$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB);
		if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		
		$sql = "INSERT INTO conutmoney(openid,nickname,sex,city,province,country,headimgurl) VALUES ('$openid','$nickname','$sex','$city','$province','$country','$headimgurl')";
		$result = $mysqli->query($sql);
		if($result){
			echo "ok";
		}
		$mysqli->close();
		
	}

//判断用户是否已经存在,因为用户只有openid是唯一不变的，所以通过判定openid来判断用户是否存在
	function isUserExists($openid){
		$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB);
		if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		
		$sql = "SELECT * FROM conutmoney WHERE openid = '{$openid}'";
		$result = $mysqli->query($sql);
		if($result->num_rows>0){
			$isExist = true;
		}else{
			$isEXist = false;
		}
		
		$mysqli->close();
		return $isExist;
	}




?>