<?php
$dsn = 'mysql:host=localhost;dbname=booking';
$username = 'root';
$password = '';
$options = [];
try {
		$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    print_r($e);
}
//dbname = exacfeem_booking
//username = exacfeem_booking123
//password =SOYz3V~xLY1(

//Manager = admin/admin@1234
//employee = employee/emp@9876
?>