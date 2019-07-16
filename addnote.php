<?php
require "includes/functions.php";
	$response = "error";
		if( isset($_POST['note']) ){
			$note = $_POST['note'];
			$response = addNote($note);
		}else{
    		$response = "Error Occured while insering notes.";
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