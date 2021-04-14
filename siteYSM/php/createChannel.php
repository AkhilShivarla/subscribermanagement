<?php 
    include 'connection.php'; 
    $cname = $_POST["cname"];
    $cid = $_POST["cid"];
    $pass = $_POST["pass"];
	$q3 = "INSERT INTO channels values('$cid','$cname','$pass')";
	$res = $con->query($q3);
	if($res==1){
	    echo "success";
	}else{
	    echo "failed";
	}
$con->close();
?>