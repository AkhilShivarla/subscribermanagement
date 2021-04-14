<?php

include 'php/connection.php';
$q1 = "SELECT * FROM channels";

$res = $con->query($q1);
$con->close();

?>
<HTML>
<head>
<title> Subscriber Space </title>
<link rel="icon" href="img/logo.png" type="image/x-icon" /> 

<meta name="viewport" content="width=device-width height=device-height,initial-scale=1.0" />
<meta http-equiv="X-UA-compatible" content="ie=edge" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8" >

<!-- css files  -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<link href="css/default.css" rel="stylesheet">

<!-- js files -->

 <script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
 <div class='loader' style='color:white;height:100%;width:100%;z-index:5;position:fixed;top:37%;text-align:center;display:block;'>
    <i class='fa fa-spinner fa-spin' style='font-size:100px' aria-hidden='true'></i>
</div>
<divvv>
</divvv>
<style>
    #cregoverlay {
  position: fixed;
  display: none;
  width: 100%;
  height:100%;
  background-color:rgba(7,28,38,.8); // black==rgba(0,0,0,0.75);
  z-index: 10;
  cursor: pointer;
  opacity:1;
  text-align:center;
}
.newchannel{
    right:12%;
    position:absolute;
    top:25%;
    font-weight: bold;
    color:white;
}
#regc{
    background-color:white;
    color:black;
    border-radius:5px;
    outline: none;
    padding: 5px;
    border: none;
    cursor:pointer;
}
#regc:hover{
    background-color:#e6e6e6;
}
.register-jumbo{
    width: 300px;
    background-color:rgba(7,28,38,.6);
}
.col-lg-4{
    padding-top:20px;
}
</style>
</head>
<body id="bd" style="background-color:white;overflow-x:hidden;" >
<!--body section starts-->
    <div id="cregoverlay">
        <br><br><br><br><br>
	    <center>
	       <div class="register-jumbo jumbotron">
	           <i class="fa fa-spinner fa-spin cspin" style="font-size:50px;color:#002080;display:none" ></i>
		        <div>
                    <input type="text" id="cname" name="cname" placeholder="Youtube Channel Name"> 
                </div><br>
                <div>
                    <input type="text" id="cid" name="cid" minlength="24" maxlength="24" placeholder="Youtube Channel Id"> 
                </div><br>
                <div>
                    <input type="password" id="pass" name="pass" placeholder="Enter Password"> 
                </div><br>
		        <hr color="white" width="70%;">
		        <button class="btn btn-success" id="submit-btn" onclick="reg()">Register</button>
		        <button class="btn btn-danger" id="cancel" onclick="$('#cregoverlay').hide()">Cancel</button>
		   </div>
		</center>
	</div>
	<button onclick="topFunction()" id="myBtn" data-toggle="tooltip" title="Go to top"><i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i></button>
	        <div class="navbar sticky">
				<i class="fa fa-bars navbtn" onclick="openclose()" aria-hidden="true"></i>
				<p class="cstw"> SubscriberSpace </p>
				<div class="newchannel">
				    <button id="regc" onclick="$('#cregoverlay').show()">Register Channel</button>
				</div>
			</div>
			<div class="row allchannels" >
			<?php while($allchannels = $res->fetch_assoc()){ 
			        $cid=$allchannels["cid"]; ?>
			        <div class="col-lg-4" >
					    <center>
					        <div class="channelcard" onclick="setURL('<?php echo $cid; ?>')">
					        	<?php echo $allchannels["cname"]; ?>
					        </div>
					    </center>
				    </div>
			<?php } ?>
			</div>
			<br><br><br><br><br><br>
			<script type="text/javascript">
			function setURL(id){
				//alert(id);
				window.location.replace("https://subscriberspace.000webhostapp.com/?cid="+id);
			}
			$(document).ready(function(){
				$('divvv').hide();
                $('.loader').hide();
                $('.cspin').hide();
			});
			function reg(){
			    $('.cspin').show();
			    var dataText = "cname="+$("#cname").val();
			    dataText+="&cid="+$("#cid").val();
			    dataText+="&pass="+$("#pass").val();
			    $.ajax({
					type:"POST",
					url:"php/createChannel.php",
					data:dataText,
					success:function(result) {
					    if(result=="success")
					    {
					        //alert(result);
					        $('.cspin').hide();
					        document.cookie="cid="+$("#cid").val();
					        window.location.replace("https://subscriberspace.000webhostapp.com/?cid="+$("#cid").val());
                        }else{
                            alert(result);
                            $('.cspin').hide();
                        }
                        
					}
				});
			}
			function getCookie(cname) {
				var name = cname + "=";
				var decodedCookie = decodeURIComponent(document.cookie);
				var ca = decodedCookie.split(';');
				for(var i = 0; i < ca.length; i++) {
				    var c = ca[i];
				    while (c.charAt(0) == ' ') {
				        c = c.substring(1);
				    }
				    if(c.indexOf(name) == 0) {
				    	return c.substring(name.length, c.length);
				    }
				}
				return null;
			}
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
              } else {
                  $(".sticky").css("top","0");
                document.getElementById("myBtn").style.display = "none";
              }
            }
            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
	    </script>
	<div id="followus" >
		<div>
			<a href="#" class="footer-links" onclick="home_fun()">videos</a>
			<a href="#" class="footer-links footerhline" style="border-right:2px solid #6B6B6C;" ></a>
			<a href="#" class="footer-links" onclick="home_fun()">links</a>
			<a href="#" class="footer-links footerhline" style="border-right:2px solid #6B6B6C;" ></a>
			<a href="privacy.html" target="_blank" class="footer-links" >privacy policy</a>
			<a href="#" class="footer-links footerhline" style="border-right:2px solid #6B6B6C;" ></a>
			<a href="#" class="footer-links" onclick="about_fun()">about</a>
		</div>
		<center> 
			<hr class="footerhr"  />
		</center>
		<b style="letter-spacing:10px">follow  us</b> &nbsp;&nbsp;
		<a href="https://www.facebook.com/CS-Technical-Works-1331647520247532/" targer="_blank" ><i class="fa fa-facebook-square fa-lg af" aria-hidden="true"></i></a>
		<a href="https://twitter.com/charankontham" targer="_blank" ><i class="fa fa-twitter-square fa-lg af" aria-hidden="true"></i></a>
		<a href="https://wa.me/919505678967" targer="_blank" ><i class="fa fa-whatsapp fa-lg af" aria-hidden="true"></i></a>
		<a href="https://www.youtube.com/channel/UCLMFUUiGdSU7iAw9NlWOT9w" targer="_blank" ><i class="fa fa-youtube-play fa-lg af" aria-hidden="true"></i></a>
	</div>
</body>
</HTML>