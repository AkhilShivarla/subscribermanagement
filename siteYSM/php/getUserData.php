<?php
include 'connection.php';
//if(isset($_COOKIE["admin"]))
//{
//$tit = $_REQUEST["q"];
$q1 = "select email,interest,age from users";
//$q1="select age,interest,technical_c,news_c from users";
$res = $con->query($q1);

$ret = array();
$i = 0;
    while($row = $res->fetch_assoc()) {
        $ret[$i] = array("email"=>$row["email"],
            "interest"=>$row["interest"],
            "age"=>$row["age"]
            );
      $i++;
    }
echo json_encode($ret);
    
//}
?>

