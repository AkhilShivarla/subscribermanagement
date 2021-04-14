<?php
include 'connection.php';
if(isset($_COOKIE["admin"]))
{
$tit = $_REQUEST["q"];
$q1 = "select * from tech where Tit='$tit' AND cid='$cid'";
$res = $con->query($q1);
$row = $res->fetch_assoc();
$ret = array("title"=>$row["Tit"],
            "des"=>$row["Des"],
            "links"=>$row["Links"],
            "des2"=>$row["Des2"],
            "img"=>$row["Img"]
            );
    echo json_encode($ret);
}
?>

