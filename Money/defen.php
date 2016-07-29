<?php
//获取指定openid用户的得分
	function getUsedScore($openid){
		$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB);
		if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		
		$sql = "SELECT * FROM conutmoney WHERE openid ='{openid}'";
		$result = $mysqli->query($sql);
		if($result->num_rows>0){
			$user = $result->fetch_assoc();
			$score = $user["score"];
		}else{
			$score = 0;
		}
		$mysqli->close();
		return $score;
	}
	
//	更新用户的得分
	function updateScore($openid,$score){
		$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT,SAE_MYSQL_USER,SAE_MYSQL_PASS,SAE_MYSQL_DB);
		if($mysqli->connect_errno){
			die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		
		$sql = "UPDATE conutmoney SET score = '{$score}' WHERE openid  = '{$openid}'";
		$result = $mysqli->query($sql);
		
		$mysqli->close();
		
	}
	
	$openid = $_GET["openid"];
	$newScore = $_GET["score"];
	$score = getUsedScore($openid);
	if($newScore>$score){
		updateScore($openid, $newScore);
		echo $newScore;
	}else{
		echo $score;
	}






?>