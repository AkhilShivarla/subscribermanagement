<?php
require 'php/connection.php';

if( isset($_GET['cid']) ) {
    $cid = $_GET['cid'];

    if(strlen($cid) == 24) {
        
        $q1 = "select * from channels where cid='$cid'";
        $res = $con->query($q1);
        if($res->num_rows > 0)
            setcookie("cid", $cid);
        else
            header('Location: allchannels.php');
    }
    else if( (strlen($cid) > 0) && (strlen($cid) < 24) ) {
        header('Location: cnotfound.php'); 
    }
}
else if(!isset($_COOKIE['cid']))
    header('Location: allchannels.php');
else
    header('Location: allchannels.php');
?>