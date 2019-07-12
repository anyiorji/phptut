<?php

$name = "";
$email = "";
$pswd = "";
$hash = "";

$ok = true;

if ( !(isset($_POST["name"] )) || $_POST["name"] === " "){
$ok = false;
} 
else {
$name = $_POST["name"];
}


if ( !(isset($_POST["email"] )) || $_POST["email"] === " "){
$ok = false;
} 
else {
$email = $_POST["email"];
}


if ( !(isset($_POST["pswd"] )) || $_POST["pswd"] === " "){
$ok = false;
} 
else {
$pswd = $_POST["pswd"];
}


if ($ok) {
/* connect to database */

$hostname = "localhost";
$username = "phptut";
$password = "kelvinrob2002";
$database = "phptut";

$conn = new mysqli($hostname,$username,$password,$database);
	if($conn -> connect_error){
		die("Connection failed: " . $conn -> connect_error);
}

	$hash = password_hash($pswd, PASSWORD_DEFAULT);
	$sql = sprintf("insert into users (name,email,pswd) values('%s','%s','%s')",
	mysqli_real_escape_string($conn,$name),
	mysqli_real_escape_string($conn,$email),
	//mysqli_real_escape_string($conn,$pswd),
	mysqli_real_escape_string($conn,$hash));
	
	$result = $conn -> query($sql);
	
	if ($result) {
	echo "New record added successfuly";
	}else{
	echo "Error: " . $sql . "<br>" . $conn ->error;
	}
	
	$conn->close();
	
	}
	else {
	echo  "Some fileds are empty";
	}
	
	?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" name="reg">
<legend>Registration Form</legend><br>

<label>Name:</label> <input type="text" name="name">
<label>Email:</label> <input type="text" name="email">
<label>Password:</label> <input type="password" name="pswd">
<input type="submit" value="Submit">
</form>
</body>
</html>