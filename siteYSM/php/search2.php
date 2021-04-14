<?php 
    include 'connection.php';
	$text = $_POST['reqData'];
	$lang = $_POST['lang'];
	$cid = $_COOKIE['cid'];
	$q1 = "SELECT * FROM tech WHERE (Tit LIKE '%$text%' OR Date LIKE '%$text%' OR Des LIKE '%$text%' OR Links LIKE '%$text%') AND (Language='$lang') AND cid='$cid' ORDER BY Id DESC LIMIT 10";
	$res = $con->query($q1);
	if(!(mysqli_num_rows($res)==0))
	    {
	        while($row = $res->fetch_assoc())  {
				$title=$row["Tit"];
				$date=$row["Date"];
				$img=$row["Img"];
				$des=$row["Des"];
				$links=$row["Links"];
				$des2=$row["Des2"];
				$id = $row["Id"];
				echo "<div class=techbox>
				        <div class=jumbotron>
					<div class=row2 >
										<b>$title</b>
					</div><br>
					<div class=imgclass>
						<center>
							<image class=img2 src=.\img\\$img alt=ImageNotAvailable ></image>
						</center>
					</div>
					<br>
					<div class=row>
						<div class=col-lg-1>
						</div>
						<div class=col-lg-10>
							<p class=desp >$des<br>$des2</p><br>
							<center>
							    <a href=$links>$links</a>
							    <p class=date2 style=color:#808080 >$date &nbsp&nbsp&nbsp #$id tech_news</p>
							</center>
						</div>
						<div class=col-lg-1>
						</div>
					</div>
					</div>
					</div>";
			}
			
	    }
	    else
		{
	        echo"<center><br><br><h1><p style=color:#b3b3b3;font-weight:bold;margin-top:11.5%;margin-bottom:17%><i class=fa-frown-o aria-hidden=true></i> No results found</p></h1></center>";
	    }
	
$con->close();
?>