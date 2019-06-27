<?php
require "includes/functions.php";
	$b = array();
  $details = getTotalBookings("");
  echo  json_encode($details);
?>