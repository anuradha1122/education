<?php

#page number 02

#declair database
include("database.php");

$database = new Database();

if(isset($_GET['id'])){
	session_destroy();
	$database -> headerto('index.php');
}

?>