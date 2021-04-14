<?php 
    include 'php/connection.php';
    $user = $_POST["user"];
    $password = $_POST["pass"];
    $pass1 = $_POST["pass"];
    $pass = crypt($password,'$5$cstech010=0000$id10176131_cstech');
    $cid = $_COOKIE["cid"];
    if($_POST["admin"]=="yes")
	{
	    $q1 = "SELECT * FROM channels WHERE cid='$user' AND password='$pass1' ";
	    $res = $con->query($q1);
	    if(mysqli_num_rows($res)==1)
	    {
	        echo "admin";
	    }
	    else
	    {
	        echo "failed-admin";
	    }
	}
	else
	{
	    $q1 = "SELECT username,email,userimg FROM users WHERE username='$user' AND pass='$pass' OR email='$user' AND pass='$pass' AND cid='".$cid."'";
	    $res = $con->query($q1);
	    if(mysqli_num_rows($res)==1)
	    {
		    $usermail = "usermail";
		    $userimg = "userimg";
		    $r = $res->fetch_assoc();
		    setcookie("usermail",$r["email"],time() + (100 * 365 * 24 * 60 * 60));
		    setcookie("userimg",$r["userimg"],time() + (100 * 365 * 24 * 60 * 60));
		    setcookie("uname",$r["username"],time() + (100 * 365 * 24 * 60 * 60));
		    if(isset($_COOKIE["uname"]))
		    {
		        echo "userhome";
		    }
		    else
		    {
		        echo "failed-uname-not-set";
		    }
	    }
	    else
	    {
	        echo "failed-user";
	    }
	}
	
$con->close();
?>