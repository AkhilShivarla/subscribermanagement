<?php
include 'php/connection.php';


    $title = $_POST["title"];
    $des = $_POST["des"];
    $des2 = $_POST["des2"];
    $links = $_POST["links"];
    $lang = $_POST["lang"];
    $category = $_POST["category"];
    $img = $_FILES['file']['name'];
    $location = "img/".$img;
    $cid = $_COOKIE['cid'];
    $cid = str_replace(" ","-",$cid);
    if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
    {
        $q1 = "insert into tech (cid,Tit,Des,Des2,Links,Img,Language,category) values('$cid','$title','$des','$des2','$links','$img','$lang','$category')";
        if(mysqli_query($con,$q1)){
            echo "suc";
            $q1 = "select email from users where category='".$category."'";
            $res = $con->query($q1);
            while($finalres = $res->fetch_assoc())  {
                echo $finalres["email"]." ,";
            }
        }
        else{
            echo "notsuc";
        }
    }


?>