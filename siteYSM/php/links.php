<?php

include 'connection.php';
if(isset($_COOKIE['admin']))
{
    $link = $_POST["link"];
    $linkname = $_POST["name"];
    $cid = $_COOKIE['cid'];

    $q1 = "insert into links (cid,Link,linkname) values('$cid','$link','$linkname')";
    if(mysqli_query($con,$q1))
        echo "suc";
    else
        echo "notsuc";
}

?>