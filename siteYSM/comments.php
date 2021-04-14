<?php
include 'php/connection.php';

$cid = $_COOKIE['cid'];
$cname = $_COOKIE['cname'];
$q3="SELECT * FROM suggest where cid='$cid' order by Id desc";
$res = $con->query($q3);
$con->close();
?>
<HTML>
<head>
<title>	Comments </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width height=device-height,initial-scale=1.0" />
<meta http-equiv="X-UA-compatible" content="ie=edge" /> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- css files  -->
<link rel="stylesheet/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/comments.css" rel="stylesheet">

<!-- js files -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/admin.js"></script>
</head>
<body id="bd" style="background-color:white;overflow-x:hidden;">
	<div class="navbar sticky">
				<i class="fa fa-bars navbtn" onclick="openclose()" aria-hidden="true"></i>
				<p class="cstw">Cs technical works  | </p>
				<p class="cstw"><?php echo $cname; ?></p>
	</div>	
	<div id="mySidenav" class="sidenav stickysn" >
				<a href="#" class="closenav" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
				<a href="admin.html" class="nav-links" onclick="home_fun()">Home </a>
				<a href="insert.html" class="nav-links" >Add Bulletin</a>
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
	<div class="h">
		<center>
		    <br/><h1><button onclick="cluster()">&nbsp;&nbsp;Cluster&nbsp;&nbsp;</button></h1><br/>
		    <i class="fa fa-spinner fa-spin cspin" style="font-size:50px;color:#002080;display:none" ></i>
		    <h3 id="status"></h3><br/>
		<h2><b>Comments</b></h2><br>
		<div class="msgs">
		    <i class="fa fa-spinner fa-spin comspin" style="font-size:50px;color:#002080"></i>
		    <?php while($rows = $res->fetch_assoc()) { 
		            $date=$rows["Date"];
	                $question=$rows["Sugg"];
	                $useremail=$rows["Email"];
	                $id =$rows["Id"];
	                $ans =$rows["Answer"];?>
		        <div class="usermsg">
		            <div>
		                <div class="row">
		                    <div class="usernameclass col-lg-4" ><i class="fa fa-user" aria-hidden="true"></i> <?php echo     $useremail ?></div>
		                    <div class="col-lg-4"></div>
		                    <div class="dateclass col-lg-4"><b>Date</b> : <?php echo $date ?></div>
		                </div>
		                <br>
		                <div class="questionbox">
		                    <div class="questionid"><b>Question <?php echo $id ?></b></div> 
		                    <div class="question"><?php echo $question ?></div>
		                </div>
		                <br>
		                <?php if($ans=="" or $ans==null){ ?>
		                <a href="#" id="a<?php echo $id ?>" onclick="openBox('<?php echo $id ?>')">Reply<i class="fa fa-caret-up"></i></a>
		                <div class="allanswerboxes" id="<?php echo $id ?>">
		                    <textarea  cols="50" rows="5"></textarea>
		                    <button onclick="sendAnswer('<?php echo $id ?>')">submit</button>
		                </div>
		                <?php }else{ ?>
		                <a href="#" id="a<?php echo $id ?>" onclick="showAnswer('<?php echo $id ?>')">Reply</a>
		                <div class="allanswerboxes" id="<?php echo $id ?>">
		                    <?php echo $ans ?>
		                </div>
		                <?php } ?>
		                
		            </div>
		        </div>
		        <hr>
		    <?php } ?>
		</div>
		</center>
	</div>
	<script >
	    //alert();
	    
        $(".allanswerboxes").hide();
        function openBox(id){
            id = "#"+id;
            $(id).slideToggle();
            id = id+" i";
            $(id).toggleClass("fa-caret-down");
        }
        $(document).ready(function(){
            $(".comspin").hide(500);
        });
        function sendAnswer(id){
            var boxid = "#"+id+" textarea";
            var dataText = "id="+id;
            var ans = $(boxid).val();
            dataText+= "&ans="+ans;
            console.log(dataText);
            $.ajax({
                type:"POST",
				url:"php/storeAdminAnswer.php",
				data:dataText,
				success:function(result) { 
				    if(result=="success"){
				        var tempId = "#"+id;
				        var aId = "#a"+id;
				        $(aId).attr("onclick","showAnswer('"+id+"')");
				        $(aId).html("Reply");
				        $(tempId).html(ans);
				    }
					
				}
            });
        }
        function showAnswer(id){
            id = "#"+id;
            $(id).slideToggle();
        }
        
        function cluster() {
            $(".cspin").show(500);
            $.ajax({
                type:"POST",
				url:"php/cluster.php",
				success:function(result) { 
				    console.log(JSON.parse(result));
					var res = JSON.parse(result);
					$("#status").html("Relevant Topics are<br/>");
					for(var i in res) 
					   $("#status").html($("#status").html() + res[i] + " "); 
					$("#status").html($("#status").html() + "<br/>"); 
					$(".cspin").hide(500);
				}
				
            });
        }
        
	</script>
</body>
</html>