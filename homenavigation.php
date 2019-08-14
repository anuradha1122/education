<?php
#page number 03
ob_start();

#declair database
include("database.php");
$database = new Database();

$database -> empty_session();

if(isset($_GET["home_id"])){

	 $home_id = $database -> link_to_variabal($_GET["home_id"]);
	 $navigation_data = $database -> table_by_id($home_id,'home_item','hi_id');
	 $database -> headerto($navigation_data['page']);
	 

}else{

	$database -> headerto('home.php');
}
   
?>