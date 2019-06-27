<?php
require "includes/functions.php";
	$response = "error";
		if( 
			isset($_POST['customerNameR']) && 
			isset($_POST['contactNoR']) && 
			isset($_POST['foodTasteQuality']) &&
			isset($_POST['hygieneStandards']) &&
			isset($_POST['staffManagement']) ){
			$customerName = $_POST['customerNameR'];
			$contactNo = $_POST['contactNoR'];
			$foodTasteQuality = $_POST['foodTasteQuality'];
			$hygieneStandards = $_POST['hygieneStandards'];
			$staffManagement = $_POST['staffManagement'];
			
			echo $response = addReview($customerName,$contactNo,$foodTasteQuality,$hygieneStandards,$staffManagement);

			
			
	    }else{
    		echo("error"); 
    	}
    
    //}
	if($response == "success"){
		//header('location:../AddCities.php?response=Record Save Successfully');
		echo $response;
	}else{
		//header('location:../AddCities.php?response=Error While Saving Record ');
		echo $response;
	}

?>