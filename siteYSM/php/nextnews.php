<?php
    include 'connection.php';
    $count = $_POST["count"];
    $lang = $_POST["lang"];
	$cid = $_COOKIE['cid'];

    if($lang=="telugu"){
        $count = ($count*2)-1;
    }else{
        $count = $count*2;
    }
	$q1 = "SELECT * FROM tech WHERE Id='$count' AND cid='$cid'";
	$res1 = $con->query($q1);
    if(mysqli_num_rows($res1)==1){
        $row1 = $res1->fetch_assoc();
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
    else
    {
        echo "failed";    
    }
$con->close();
    /*include 'connection.php';
	$count1 = $_POST["count"];
	$q1 = "SELECT Id FROM tech";
	$res1 = $con->query($q1);
    $temp1 = mysqli_num_rows($res1)-(((int)$count1)*10);
    if($temp1>10)
    {
        $q2 = "SELECT * FROM tech WHERE Id>($temp1-10) && Id<=$temp1 ORDER BY Id DESC";
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
            echo "failed";    
        }
    }
    else
    {
        $q3 = "SELECT * FROM tech WHERE Id<=$temp1 ORDER BY Id DESC";
        $res3 = $con->query($q3);
        if(mysqli_num_rows($res3)<10)
        {
            while($row2 = $res3->fetch_assoc())  {
				$title=$row2["Tit"];
				$date=$row2["Date"];
				$img=$row2["Img"];
				$des=$row2["Des"];
				$links=$row2["Links"];
				$des2=$row2["Des2"];
				$technum =$row2["Id"];
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
            echo "failed";
        }
    }
$con->close();*/
?>