<?php
session_start();
require "./config/config.php";
date_default_timezone_set('Europe/London');

function getReviews(){
	global $connection;
	$sql = 'SELECT * FROM tblreviews order by reviewid asc ';

	$statement = $connection->prepare($sql);
	$statement->execute();
	$reviewList = $statement->fetchAll(PDO::FETCH_OBJ);
	return $reviewList;
}

function getBookingsByDate($date,$status,$phoneNo){
	global $connection;
//	$sql = "SELECT * FROM tblbookings b left join status s on b.status = s.statusid where  ";
	if(strlen($date)>0 && $status == -1)
		 $sql = "SELECT * FROM tblbookings b left join status s on b.status = s.statusid where reservationdate = '".$date."'";
	elseif(strlen($date)>0 && $status >= 0)
		 $sql = "SELECT * FROM tblbookings b left join status s on b.status = s.statusid where reservationdate = '".$date."' and status = ".$status;
	elseif(strlen($date)>0 || $status >= 0 && strlen($phoneNo)>0)
		 $sql = "SELECT * FROM tblbookings b left join status s on b.status = s.statusid where reservationdate = '".$date."' and status = ".$status." and contactno like %".$phoneNo."%";
	else
	 $sql = 'SELECT * FROM tblbookings b left join status s on b.status = s.statusid where reservationdate = curdate()';

		/*if(strlen($date))
			$sql = $sql." reservationdate = '".$date."'";
		if($status>0)
			$sql = $sql." and status = ".$status;
		if(strlen($phoneNo)>0)
			echo $sql = $sql."  contactno like '%".$phoneNo."%'";
		else
			echo $sql = $sql." and contactno like '%".$phoneNo."%'";*/

	$statement = $connection->prepare($sql);
	$statement->execute();
	$bookingList = $statement->fetchAll(PDO::FETCH_OBJ);
	return $bookingList;

}


function getTotalBookings($date){
	global $connection;
	$sql = 'SELECT count(bookingid) as bookingid,sum(adults) as ad, sum(child) as ch, sum(persons) as persons FROM tblbookings b where reservationdate = curdate() ';
	$statement = $connection->prepare($sql);
	$statement->execute();
	$totalBookings = $statement->fetch(PDO::FETCH_OBJ);
	return  $totalBookings;
}

function updateBookingStatus($status, $bookingid){
	global $connection;
	 $sql = 'UPDATE tblbookings set status=:status ,checkin=:checkin where bookingid =:bookingid ';		
		try {

			$checkin = date('H:i:s');
			$statement = $connection->prepare($sql);
			 if ($statement->execute([':status' => $status,':checkin' => $checkin,':bookingid' => $bookingid ])) {
				//echo "success";
				$response = "success";
			}else{
				$response = "error";
				//echo "error";
			}
		}
		catch (exception $e) {
		    //code to handle the exception
		    echo $e;
		}
		finally {
		    //optional code that always runs
		   // $connection = null ;
		}
		return $response;
}

function addBooking($customerName,$contactNo,$address,$reservationDate,$persons,$adults,$child,$reservationTime,$perHeadCharges,$deposite,$totalAmount,$minimumPayment,$paymentMode,$zone,$status,$note){
	try {
		
			global $connection;
			$sql = 'INSERT INTO tblbookings(customerName,contactNo,address,reservationDate,persons,adults,child,reservationTime,perHeadCharges,deposite,totalAmount,minimumPayment,paymentMode,zone,status,createdtimedate,updatedtimedate,note) VALUES(:customerName,:contactNo,:address,:reservationDate,:persons,:adults,:child,:reservationTime,:perHeadCharges,:deposite,:totalAmount,:minimumPayment,:paymentMode,:zone,:status,:createdtimedate,:updatedtimedate,:note)';
			
		   	 // run your code here
				$statement = $connection->prepare($sql);
				//$statement->debugDumpParams();
				if ($statement->execute([':customerName' => $customerName,':contactNo' => $contactNo,':address' => $address,':reservationDate' => $reservationDate,':persons' => $persons, ':adults' => $adults, ':child' => $child, ':reservationTime' => $reservationTime, ':perHeadCharges' => $perHeadCharges, ':deposite' => $deposite, ':totalAmount' => $totalAmount, ':minimumPayment' => $minimumPayment, ':paymentMode' => $paymentMode, ':zone' => $zone, ':status' => $status, ':createdtimedate' => date('y:m:d h:i:s'), 
					':updatedtimedate' => date('y:m:d h:i:s'),':note' => $note])) {
					//echo "success";

					$response = "success";
				}else{
					$errors = $statement->errorInfo();
					$response = "error".$errors[2];
					echo $response;
				}
			}
			catch (exception $e) {
			    //code to handle the exception
			}
			finally {
			    //optional code that always runs
			   // $connection = null ;
			}
			return $response;
}
function updateBooking($bookingId,$customerName,$contactNo,$address,$reservationDate,$persons,$adults,$child,$reservationTime,$perHeadCharges,$deposite,$totalAmount,$minimumPayment,$paymentMode,$zone,$note){
	try {
		
			global $connection;
			$sql = 'UPDATE tblbookings SET customerName=:customerName,contactNo=:contactNo,address=:address, reservationDate=:reservationDate,persons=:persons,adults=:adults,child=:child,reservationTime=:reservationTime,perHeadCharges=:perHeadCharges,deposite=:deposite,totalAmount=:totalAmount,minimumPayment=:minimumPayment,paymentMode=:paymentMode,zone=:zone,updatedtimedate=:updatedtimedate,note=:note where bookingId =:bookingId';
			
		   	 // run your code here
				$statement = $connection->prepare($sql);
				//$statement->debugDumpParams();
				if ($statement->execute([':customerName' => $customerName,':contactNo' => $contactNo,':address' => $address,':reservationDate' => $reservationDate,':persons' => $persons, ':adults' => $adults, ':child' => $child, ':reservationTime' => $reservationTime, ':perHeadCharges' => $perHeadCharges, ':deposite' => $deposite, ':totalAmount' => $totalAmount, ':minimumPayment' => $minimumPayment, ':paymentMode' => $paymentMode, ':zone' => $zone,':updatedtimedate' => date('y:m:d h:i:s'), ':note' => $note,
					':bookingId' => $bookingId])) {
					//echo "success";

					$response = "success";
				}else{
					$errors = $statement->errorInfo();
					$response = "error".$errors[2];
					echo $response;
				}
			}
			catch (exception $e) {
			    //code to handle the exception
			}
			finally {
			    //optional code that always runs
			   // $connection = null ;
			}
			return $response;
}

function getBookingDetialById($bookingId){
	if($bookingId > 0){
		global $connection;
		$sql = "SELECT *  FRom tblbookings b where bookingId = ".$bookingId;
		$statement = $connection->prepare($sql);
		$statement->execute();
		$bookingDetails = $statement->fetch(PDO::FETCH_OBJ);
		return $bookingDetails;
	}else{
		return "Booking Id is invalid";
	}
	
}



/*function updateBooking($customerName,$contactNo,$address,$reservationDate,$persons,$adults,$child,$reservationTime,$perHeadCharges,$deposite,$totalAmount,$minimumPayment,$paymentMode,$zone,$status){
	try {
			global $connection;
			$sql = 'INSERT INTO tblbookings(customerName,contactNo,address,reservationDate,persons,adults,child,reservationTime,perHeadCharges,deposite,totalAmount,minimumPayment,paymentMode,zone,status) VALUES(:customerName,:contactNo,:address,:reservationDate,:persons,:adults,:child,:reservationTime,:perHeadCharges,:deposite,:totalAmount,:minimumPayment,:paymentMode,:zone,:status)';
			
		   	 // run your code here
				$statement = $connection->prepare($sql);
				if ($statement->execute([':customerName' => $customerName,':contactNo' => $contactNo,':address' => $address,':reservationDate' => $reservationDate,':persons' => $persons, ':adults' => $adults, ':child' => $child, ':reservationTime' => $reservationTime, ':perHeadCharges' => $perHeadCharges, ':deposite' => $deposite, ':totalAmount' => $totalAmount, ':minimumPayment' => $minimumPayment, ':paymentMode' => $paymentMode, ':zone' => $zone, ':status' => $status])) {
					//echo "success";
					$response = "success";
				}else{
					$errors = $statement->errorInfo();
					$response = "error11".$errors[2];
					echo $response;
				}
			}
			catch (exception $e) {
			    //code to handle the exception
			}
			finally {
			    //optional code that always runs
			   // $connection = null ;
			}
			return $response;
}*/


function getAvailableSeats($reservationdate){
	global $connection;
	$sql = "SELECT sum(persons) as persons FROM tblbookings b where reservationdate = '".$reservationdate."'";
	$statement = $connection->prepare($sql);
	$statement->execute();
	$availableSeats = $statement->fetch(PDO::FETCH_OBJ);
	return $availableSeats->persons;

}

function getStatusList(){
	global $connection;
	$sql = "SELECT statusid,value FROM status";
	$statement = $connection->prepare($sql);
	$statement->execute();
	$statusList = $statement->fetchAll(PDO::FETCH_OBJ);
	return $statusList;

}

function getBookingById($id){
	global $connection;
	$sql = 'SELECT * FROM tblbookings b where bookingid = '.$id;
	$statement = $connection->prepare($sql);
	$statement->execute();
	$bookingDetails = $statement->fetch(PDO::FETCH_OBJ);
	return $bookingDetails;
}


function addReview($customerName,$contactNo,$foodTasteQuality,$hygieneStandards,$staffManagement){
	try {
			global $connection;
			$sql = 'INSERT INTO tblreviews(customername,contactno,foodtastequality,hygienestandards,staffmanagement) VALUES(:customername,:contactno,:foodtastequality,:hygienestandards,:staffmanagement)';
			
		   	 // run your code here
				$statement = $connection->prepare($sql);
				if ($statement->execute([':customername' => $customerName,':contactno' => $contactNo,':foodtastequality' => $foodTasteQuality,':hygienestandards' => $hygieneStandards,':staffmanagement' => $staffManagement])) {
					$response = "success";
				}else{
					$errors = $statement->errorInfo();
					$response = "error11".$errors[2];
					echo $response;
				}
			}
			catch (exception $e) {
			    //code to handle the exception
			}
			finally {
			    //optional code that always runs
			   // $connection = null ;
			}
			return $response;
}

function login ($userName, $password){
	global $connection;
	$response = "error";
	$sql ="SELECT * FROM tblusers WHERE username=:username and password=:password";
		try {
			$statement = $connection->prepare($sql);
			if ($statement->execute([':username' => $userName,':password' => md5($password)])) {
				$row = $statement->fetch();
				if($statement->rowCount() > 0) {
					$response = "success";	
					$_SESSION['userRole'] = $row['role'] ;
					$_SESSION['userRoleName'] = $row['username'] ;
			}else{
					$response = "Invalid Username & Password";
					
				}
			}else{
				$response = "Invalid Username & Password";
			}
		}
		catch (exception $e) {
		    //code to handle the exception
		}
		finally {
		    //optional code that always runs
		   // $connection = null ;
		}
		return $response;
}


function getNotes(){
	global $connection;
	$sql = 'SELECT * FROM tblnotes';
	$statement = $connection->prepare($sql);
	$statement->execute();
	$notesList = $statement->fetchAll(PDO::FETCH_OBJ);
	return $notesList;
}

function addNote($note){
	try {
			global $connection;
			$sql = 'INSERT INTO tblnotes(note,createdatetime,updatedatetime) VALUES(:note,:createdatetime,:updatedatetime)';
			
		   	 // run your code here
				$statement = $connection->prepare($sql);
				if ($statement->execute([':note' => $note,':createdatetime' =>date('y:m:d h:i:s'),':updatedatetime' => date('y:m:d h:i:s')])) {
					$response = "success";
				}else{
					$errors = $statement->errorInfo();
					$response = "error11".$errors[2];
				}
			}
			catch (exception $e) {
			    //code to handle the exception
			}
			finally {
			    //optional code that always runs
			   // $connection = null ;
			}
			return $response;
}  

function deleteBooking($bookingId){
	global $connection;
	if($bookingId>0){
		$sql = "DELETE FROM tblbookings WHERE bookingid = ".$bookingId;
		$statement = $connection->prepare($sql);
		if($statement->execute()){
			$response="success";
		}else{
			$response = "Unable to delete record";
		}
		
	}else{
		$response = "Invalid details";
	}
	
	return $response;
}

?>