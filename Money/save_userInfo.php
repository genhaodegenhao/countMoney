<?php
	$name =$_GET["name"];
	$phone = $_GET["phone"];
	$openid = $_GET["openid"];
	
	function updateNameAndPhone($openid,$name,$phone){
		$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS, SAE_MYSQL_DB);
		if ($mysqli->connect_errno) {
				die($mysqli->connect_error);
		}
		$mysqli->query("set names utf8");
		
		$sql = "UPDATE conutmoney SET name = '{$name}',phone = '{$phone}' WHERE openid = '{$openid}'";			//此时的name，phone，是数据库中的名称
		$result = $mysqli->query($sql);
	
		$mysqli->close();
	}
	updateNameAndPhone($openid, $name, $phone);










?>