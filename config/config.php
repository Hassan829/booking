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
?>