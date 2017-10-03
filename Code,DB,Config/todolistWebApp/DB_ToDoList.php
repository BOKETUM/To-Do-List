<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "bb9605dc2da512", "97f1f282", "heroku_f3e4096538e77ac");

if($conn->connect_error){
	die("Connection failed:" .$conn->connect_error);
}
$conn->query("SET NAMES UTF8");
$conn->query("SET character_set_client=utf8");
$conn->query("SET character_set_connection=utf8");
$conn->query("SET character_set_results=utf8");
