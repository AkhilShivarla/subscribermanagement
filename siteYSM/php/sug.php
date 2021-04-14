<?php

include 'connection.php';
session_start();


    $_SESSION['val']="";
	$text = $_POST['text'];
	$day = date("Y/m/d");
	$cid = $_COOKIE['cid'];
	if($_SESSION['val'] != $text)
	{
        //echo "<script>console.log(".$con.")</script>";
		$email =  $_COOKIE['usermail'];
		$q2 = "INSERT INTO suggest (cid,Email,Date,Sugg) values('$cid','$email','$day','$text')";
		if($con->query($q2) === TRUE)
		{
		    $_SESSION['usermsg']=$email;
			$_SESSION['val']=$text;
			$q3="SELECT * FROM suggest where Email='$email' AND cid='$cid'";
			$res = $con->query($q3);
	       while($rows = $res->fetch_assoc()) 
	       {
	                $date=$rows["Date"];
	                $msg=$rows["Sugg"];
	                $id =$rows["Id"];
	                $admindate=$rows["Date1"];
	                $ans=$rows["Answer"];
	                if($ans=="" or $ans==null){
	                    $ans = "<ss class=wfr ><i class=fa-life-ring ></i> wait until admin respond</ss>";
	                }
	                echo"<div class=usermsg id=msg$id >
	                        <div>
	                            <h6 class=usermsgcontent >Question $id <i onclick=deletemsg($id,0)  class=fa-trash id=delete$id ></i><subdiv>$date</subdiv></h6>
	                            <p id=t>$msg</p>
	                        </div>
	                     </div>
	                     <div class=adminmsg id=adminmsg$id >
	                        <div>
	                        <h6 class=adminmsgcontent >Answer $id<i onclick=deletemsg($id,1)  class=fa-trash id=deleteadmin$id ></i><subdiv>$admindate</subdiv></h6>
	                            <p id=t>$ans &nbsp </p>
	                        </div>
	                     </div>";
	       }
		}else{
		    echo "error1";
		}
	}
	else
	{
	    echo"repeat";
	}

$con->close();
?>