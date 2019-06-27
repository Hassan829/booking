<?php
require "includes/functions.php";
	$response = "error";
		if(
			!empty($_POST['customerName']) && 
			!empty($_POST['contactNo']) && 
			!empty($_POST['address']) &&
			!empty($_POST['reservationDate']) &&
			!empty($_POST['persons']) &&
			!empty($_POST['adults']) &&
			!empty($_POST['child']) &&
			!empty($_POST['reservationTime']) &&
			!empty($_POST['perHeadCharges']) &&
			!empty($_POST['deposite']) &&
			!empty($_POST['totalAmount']) &&
			!empty($_POST['minimumPayment']) &&
			!empty($_POST['paymentMode']) &&
			!empty($_POST['zone']) /*&&
			isset($_POST['status'])*/	){
			$customerName = $_POST['customerName'];
			$contactNo = $_POST['contactNo'];
			$address = $_POST['address'];
			$reservationDate = $_POST['reservationDate'];
			$persons = $_POST['persons'];
			$adults = $_POST['adults'];
			$child = $_POST['child'];
			$reservationTime = $_POST['reservationTime'];
			$perHeadCharges = $_POST['perHeadCharges'];
			$deposite = $_POST['deposite'];
			$totalAmount = $_POST['totalAmount'];
			$minimumPayment = $_POST['minimumPayment'];
			$paymentMode = $_POST['paymentMode'];
			$zone = $_POST['zone'];
			$status = 0;
			$getAvailableSeats = getAvailableSeats($_POST['reservationDate']); 
			$seatsAvailablityCheck = $getAvailableSeats + $persons;
			if($seatsAvailablityCheck <= 600 ){
				$response = addBooking($customerName,$contactNo,$address,$reservationDate,$persons,$adults,$child,$reservationTime,$perHeadCharges,$deposite,$totalAmount,$minimumPayment,$paymentMode,$zone,$status);
			}else{
				$availableSeat = 600-$getAvailableSeats;
				$response = "Sorry booking can't complete. Only ".$availableSeat. " of seats is/are left.";
			}
			
			
	    }else{
    		echo("error"); 
    	}
    
    //}
	if($response == "success"){
		//header('location:../AddCities.php?response=Record Save Successfully');
		echo $response;
	}elseif($response == "error"){
		echo $response;
	}else{
		//header('location:../AddCities.php?response=Error While Saving Record ');
		echo $response;
	}

?>