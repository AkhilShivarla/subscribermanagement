<?php
include 'connection.php';
//if(isset($_COOKIE["admin"]))
//{
//$tit = $_REQUEST["q"];
$q1 = "select * from classify_user";
//$q1="select age,interest,technical_c,news_c from users";
$res = $con->query($q1);

$ret = array();
$i = 0;
    while($row = $res->fetch_assoc()) {
        $ret[$i] = array("age"=>$row["age"],
            "interest"=>$row["interest"],
            "technical_c"=>$row["technical_c"],
            "news_c"=>$row["news_c"]
            );
      $i++;
    }
echo json_encode($ret);
    
//}
?>

