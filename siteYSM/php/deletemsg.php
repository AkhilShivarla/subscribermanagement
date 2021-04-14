<?php

include 'connection.php';

$id = $_POST["id"];
$q2 = "DELETE FROM suggest WHERE id='$id' AND cid='$cid'";

if($con->query($q2) === TRUE)
{
    echo"success";
}
else
{
    echo"failed";
}

$con->close();
?>