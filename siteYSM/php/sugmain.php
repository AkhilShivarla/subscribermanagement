<?php

include 'connection.php';

		$email =  $_COOKIE['usermail'];
		$cid = $_COOKIE['cid'];

		if(strcmp($email,"no")==0)
		{
			echo " ";
		}
		else
		{
		    $q1="SELECT * FROM suggest where Email='$email' AND cid='$cid'";
		    $res = $con->query($q1);
		    if(!(mysqli_num_rows($res)==0))
	        {
	            while($rows = $res->fetch_assoc()) {
	                $date=$rows["Date"];
	                $admindate=$rows["Date1"];
	                $msg=$rows["Sugg"];
	                $id=$rows["Id"];
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
	        }
		}
$con->close();
?>