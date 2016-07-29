<?php

	$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS, SAE_MYSQL_DB);
	if($mysqli->connect_errno){
		die($mysqli->connect_error);
	}
	$mysqli->query("set names utf8");
	
	$sql = "SELECT name，score FROM conutmoney ORDER BY score DESC";
	$result = $mysqli->query($sql);
	$userArray = array();
	if($result->num_rows>0){
		while ($user = $result->fetch_assoc()) {
			array_push($userArray,$user);
		}
	}
	$mysqli->close();
	$json = json_encode($userArray);
	echo $json;






?>