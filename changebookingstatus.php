<?php
require "includes/functions.php";

if(isset($_POST['bookingId']) && isset($_POST['status'])){

  $status = $_POST['status'];
  $bookingId = $_POST['bookingId'];
  $details = updateBookingStatus($status, $bookingId);
   $details;
}else{
	echo "jj";
}
if("success")
	echo "Timer start";
else
	echo "Error Occured";
?>