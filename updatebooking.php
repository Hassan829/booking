<?php
require "includes/functions.php";
	$response = "error";
		if(
			!empty($_POST['customerName']) && 			
			!empty($_POST['reservationDate']) &&
			!empty($_POST['reservationTime']) ){
			$customerName = $_POST['customerName'];
			$contactNo = $_POST['contactNo'];
			$reservationDate = $_POST['reservationDate'];
			$persons = $_POST['persons'];
			$adults = $_POST['adults'];
			$child = $_POST['child'];
			$reservationTime = $_POST['reservationTime'];
			$note = $_POST['note'];
			$address = "";			
			$perHeadCharges = "";
			$deposite = "";
			$totalAmount = "";
			$minimumPayment = "";
			$paymentMode = "";
			$zone = "";	
			$status = 0;
			$address = $_POST['address'];
			$perHeadCharges = $_POST['perHeadCharges'];
			$deposite = $_POST['deposite'];
			$totalAmount = $_POST['totalAmount'];
			$minimumPayment = $_POST['minimumPayment'];
			$paymentMode = $_POST['paymentMode'];
			$zone = $_POST['zone'];
			$bookingId = $_POST['bookingId'];
			
			$getAvailableSeats = getAvailableSeats($_POST['reservationDate']); 
			$seatsAvailablityCheck = $getAvailableSeats + $persons;
			if($seatsAvailablityCheck <= 600 ){
				echo $response = updateBooking($bookingId, $customerName,$contactNo,$address,$reservationDate,$persons,$adults,$child,$reservationTime,$perHeadCharges,$deposite,$totalAmount,$minimumPayment,$paymentMode,$zone,$note);
			}else{
				$availableSeat = 600-$getAvailableSeats;
				$response = "Sorry booking can't complete. Only ".$availableSeat. " of seats is/are left.";
			}
			
			
	    }else{
    		echo("error11"); 
    	}
    
    //}
	/*if($response == "success"){
		//header('location:../AddCities.php?response=Record Save Successfully');
		echo $response;
	}elseif($response == "error"){
		echo $response;
	}else{
		//header('location:../AddCities.php?response=Error While Saving Record ');
		echo $response;
	}
*/
?>