<?php
	$score = $_GET["score"];
	
	$mysqli = new mysqli(SAE_MYSQL_HOST_M.":".SAE_MYSQL_PORT, SAE_MYSQL_USER, SAE_MYSQL_PASS, SAE_MYSQL_DB);
	if($mysqli->connect_errno){
		die($mysqli->connect_error);
	}
	$mysqli->query("set names utf8");

	$sql = "SELECT count(*) as count FROM conutmoney WHERE score >= $score";
	
	$result = $mysqli->query($sql);
	if($result->num_rows>0){
		$user = $result->fetch_assoc();
		echo $user["count"];
	}

	$mysqli->close();

?>