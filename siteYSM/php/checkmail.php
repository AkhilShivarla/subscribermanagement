<?php

include 'connection.php';

		$email = $_POST["email"];
		$q1="SELECT * from users where email='$email' AND cid='$cid'";
		$res = $con->query($q1);
		if(mysqli_num_rows($res)>=1)
	    {
	        setcookie("usermail",$email,time() + (100 * 365 * 24 * 60 * 60));
	        echo "success";   
	    }
	    else
	    {
	        echo "failed"; 
	    }
$con->close();
?>