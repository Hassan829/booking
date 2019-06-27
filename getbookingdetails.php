<?php
require "includes/functions.php";
	if(isset([$_GET['bookingId']])){
		$details = getBookingDetialById($_GET['bookingId']);
  		echo  $details;
	}else{
		echo "Invalid";
	}
  
?>