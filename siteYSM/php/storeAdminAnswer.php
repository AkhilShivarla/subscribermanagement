<?php
include 'connection.php';
$id = $_POST["id"];
$ans = $_POST["ans"];
$cid = $_COOKIE['cid'];
$query = "UPDATE suggest SET Answer='$ans' WHERE Id='$id' AND cid='$cid'";
if($con->query($query)===TRUE){
    echo "success";
}else{
    echo "failed";
}
$con->close();
?>