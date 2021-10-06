<?php

$firstname = htmlspecialchars($_REQUEST['firstname']);
$lastname = htmlspecialchars($_REQUEST['lastname']);
$phone = htmlspecialchars($_REQUEST['phone']);
$email = htmlspecialchars($_REQUEST['email']);

include 'conn.php';

if (filter_var($email, FILTER_VALIDATE_EMAIL)){
	$sql = "insert into users(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
	mysqli_query($conn,$sql);
	echo json_encode(array(
		'id' => mysqli_insert_id($conn),
		'firstname' => $firstname,
		'lastname' => $lastname,
		'phone' => $phone,
		'email' => $email
	));
}

?>