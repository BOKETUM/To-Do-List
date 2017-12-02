<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$conn = new mysqli("us-cdbr-iron-east-05.cleardb.net", "b8de87a95dd56d", "1678ea78", "heroku_d578e1a0e3638f3");
// $servername = "localhost";
// $username = "root";
// $password ="";
// $dbname ="todolist";
// $conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Connection failed:" .$conn->connect_error);
}
$conn->query("SET NAMES UTF8");
$conn->query("SET character_set_client=utf8");
$conn->query("SET character_set_connection=utf8");
$conn->query("SET character_set_results=utf8");
