<?php
include 'connection.php';
$cname = $_POST["cname"];
$cid = $_POST["cid"];
$pass = $_POST["pass"];
$q1 = "INSERT INTO channels (cid,cname,password) values('$cid','$cname','$pass')";
if($con->query($q1)){
   header('Location:../admin.php'); 
}else{
    echo "Registration failed";
}
?>