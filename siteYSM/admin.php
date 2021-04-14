<?php
require 'php/connection.php';
if(isset($_COOKIE["cid"]))
    $cid = $_COOKIE["cid"];
else {
    echo "<h1>Channel Not Found";
    exit();
}
$q1 = "select * from channels where cid = '$cid'";
$r1 = $con->query($q1);
$cname = $r1->fetch_assoc();
?>
<HTML>
<head>
<title>	Admin panel </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width height=device-height,initial-scale=1.0" />
<meta http-equiv="X-UA-compatible" content="ie=edge" /> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- css files  -->
<link rel="stylesheet/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/admin.css" rel="stylesheet">

<!-- js files -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>

</head>
<body id="bd" style="background-color:white;overflow-x:hidden;">
	
	<div class="navbar sticky">
				<i class="fa fa-bars navbtn" onclick="openclose()" aria-hidden="true"></i>
				<p class="cstw">SubscriberSpace</p>
				<p class="cstw"> <?php echo $cname["cname"]; ?></p>
	</div>	
	<div id="mySidenav" class="sidenav stickysn" >
				<a href="#" class="closenav" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
				<a href="admin.php" class="nav-links" onclick="home_fun()">Home </a>
				<a href="insert.html" class="nav-links" >Add Bulletin </a>
				<a href="recentlinks.html" class="nav-links" >Recent links</a>
				<a href="comments.html" class="nav-links" onclick="suggestion_fun()">Comments</a>
				<div class="data nav-links">Admin <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>
					<form method="post">
						<div class="data-content">
							<a class="logoutbtn" href="#" onclick="signout()" name="logout" id="out" >Sign-out</a>
						</div>
					</form>
				</div>
	</div>
	<div class="col-lg-12 audiv">
		<p class="adminuitext">Admin</p>
	</div>
	<div class="mainbody">
		<center>
			<div class="container create">
				<div class="jumbotron">
					<a href="insert.html"> Add Bulletin </a>
				</div>		
			</div>
			
			<div class="container">
				<div class="jumbotron">
					<a href="recentlinks.html"> Recent links </a>
				</div>		
			</div>
			<div class="container">
				<div class="jumbotron">
					<a href="comments.php"> Comments </a>
				</div>
			</div>
		</center>
	</div>
	
	<script src="js/admin.js"></script>
	
</body>
</html>
		
 
 
 