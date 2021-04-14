<?php 
    include 'connection.php';
    $total= 0;
	$text = $_POST['reqData'];
	$lang = $_POST['lang'];
	$cid = $_COOKIE['cid'];
	$q3 = "SELECT * FROM tech WHERE (Tit LIKE '%$text%' OR Date LIKE '%$text%' OR Des LIKE '%$text%' OR Links LIKE '%$text%') and (Language='$lang') AND cid='$cid' ORDER BY Id DESC LIMIT 3";
	$res = $con->query($q3);
	$q4 = "SELECT COUNT(Id) as ct FROM tech";
	$res1=$con->query($q4);
	$row1 = $res1->fetch_assoc();
	$total = $row1["ct"];
	if(!(mysqli_num_rows($res)==0))
	    {
	        $id=0;
	        $count=0;
	        while($row = $res->fetch_assoc())  {
	            $count=$count+1;
	            
	    $title=$row["Tit"];
	    $date=$row["Date"];
	    $img=$row["Img"];
	    $des=$row["Des"];
	    $links=$row["Links"];
	    $des2=$row["Des2"];
	    $id=$id+1;
	    if($count==$total){
	        echo"<script>$('.rttext').html('Recent Tech News');</script>";
	    }
	    else
	    {
	        echo"<script>$('.rttext').html('Search results');</script>";
	    }
	    echo "<div id=cont class=cont>
								<div id=jumbo class=jumbo >
									<div class=titdat >
											<p id=titleid class=ttid><b>$title</b></p>
											
									</div></br>
									<div class=row>
										<div class=col-lg-5>
											<image class=img1 src=img\\$img alt=ImageNotAvailable></image>
										</div>
										<div class=col-lg-7>
											<p class=text >$des</p>
											<a href=$links>$links </a>
										</div>				
									</div>
									<div class=sh$id id=dess2 style=display:none>
										<p>$des2</p>
									</div>
									<p class=dateid>$date</p>
									<center>
										<input type=hidden value=$id name=hid$id>
										<button type=button name=more  class=btn-xs id=more$id onclick=more() > <i class=fa-angle-down id=sym$id aria-hidden=true></i></button>
									</center>
								</div>
							</div>";
	  
	}
	    }
	    else{
	        echo"<center><br><br><h1><p style=color:#b3b3b3;margin-top:15%;font-weight:bold;><i class=fa-frown-o aria-hidden=true></i> No results found</p></h1></center>";
	    }
	
$con->close();
?>



