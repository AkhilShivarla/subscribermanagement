<?php 
    include 'connection.php'; 
   
	$q3 = "SELECT * FROM suggest where cid='$cid' ORDER BY Id DESC";
	$res = $con->query($q3);
	if(mysqli_num_rows($res)!=0)
	    {
	        
	        while($row = $res->fetch_assoc())  {
	            $email=$row["Email"];
	            $q4 = "SELECT name FROM users where Email='$email' AND cid='$cid'";
	            $res1 = $con->query($q4);
	            $res2 = $res1->fetch_assoc();
	            $name = $res2["name"];
	            $sugg = $row["Sugg"];
	            echo "<div class=jumbotron>
			            <div class=container>
			                <div class=row>
					            <div class=name>
						            <i class=fa-user aria-hidden=true ></i> $name
					            </div>
					            <div class=email>
						            <i class=fa-envelope aria-hidden=true></i><b> Mail :</b> $email
					            </div>
					        </div>
					        <br><br>
					        <div class=msg>
						        $sugg
					        </div>
			            </div>
		            </div>";
	       }
	    }
	    else{
	        echo"<center><br><br><h1><p style=color:#b3b3b3;margin-top:5%;font-weight:bold;><i class=fa-frown-o aria-hidden=true></i> No comments yet</p></h1></center>";
	    }
	
$con->close();
?>