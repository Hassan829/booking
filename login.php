<?php
require "includes/functions.php";

	$response = "error";
    if((isset($_POST['userName'])) && (isset($_POST['password']))){
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		 $response = login($userName, $password);
		 echo $response;
    }
    

	



?>

