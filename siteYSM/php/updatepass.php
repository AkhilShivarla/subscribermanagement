<?php 
    include 'connection.php';
    $email = $_COOKIE["usermail"];
    $password = $_POST["pass"];
    $pass = crypt($password,'$5$cstech010=0000$id10176131_cstech');
	$cid = $_COOKIE['cid'];

	$q1 = "UPDATE users SET pass='$pass' where email='$email' AND cid='$cid'";
	if($con->query($q1) === TRUE)
	{
	    echo"success";
	}
	else{
	    echo"failed";
	}
	
$con->close();
?>