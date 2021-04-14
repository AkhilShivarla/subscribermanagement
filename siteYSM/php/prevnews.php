<?php 
    include 'connection.php';
	$count1 = $_POST["count"];
	$cid = $_COOKIE['cid'];
	$q1 = "SELECT Id FROM tech";
	$res1 = $con->query($q1);
    $temp1 = mysqli_num_rows($res1)-(((int)$count1)*10);
    if($temp1!=0)
    {
        $q2 = "SELECT * FROM tech WHERE Id>'$temp1' AND Id<='$temp1'+10 AND cid='$cid' ORDER BY Id DESC";
        $res2 = $con->query($q2);
        if(mysqli_num_rows($res2)==10)
        {
            while($row1 = $res2->fetch_assoc())  {
				$title=$row1["Tit"];
				$date=$row1["Date"];
				$img=$row1["Img"];
				$des=$row1["Des"];
				$links=$row1["Links"];
				$des2=$row1["Des2"];
				$technum =$row1["Id"];
				echo "<div class=techbox>
				        <div class=jumbotron>
					<div class=row2 >
										<b>$title</b>
										
					</div><br>
					<div class=imgclass>
						<center>
							<image class=img2 src=.\img\\$img ></image>
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
							    <p class=date2 style=color:#808080 >$date &nbsp&nbsp&nbsp #$technum tech_news</p>
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
            echo "Unable to fetch data <br> please try agaian later";    
        }
    }
    else
    {
        echo "Unable to fetch data <br> please try agaian later";
    }
$con->close();
?>