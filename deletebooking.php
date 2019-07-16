<?php
require "includes/functions.php";
echo($_POST['bookingId']);
if(isset($_SESSION['userRole']) && !empty($_SESSION['userRole']) && $_SESSION['userRole'] == 1 && isset($_POST['bookingId'])&&  $_POST['bookingId'] > 0){ 
 	echo $result = deleteBooking($_POST['bookingId']);
 }else{
 	echo "Invalid details1";
 }
?>