<?php

$host = "localhost";
$db = "phploginregister";
$user = "root";
$pass = "";

try {
	$db=new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
} catch (PDOExpception $e) {
	echo $e->getMessage();
}

$api_key="ebacc5eb017493856c915d99b1225e98";

?>