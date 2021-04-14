<?php 
    include 'php/connection.php';
    $user = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $interest = $_POST["interest"];
    $age = $_POST["age"];
    $pass = crypt($password,'$5$cstech010=0000$id10176131_cstech');
    $cid = $_COOKIE['cid'];

    $ff = "SELECT * FROM users WHERE username='$user' OR email='$email' AND cid='$cid'";
    $res = $con->query($ff);
    if(mysqli_num_rows($res)!=0)
    {
	    echo "failed";
    }
    else
    {
        if(empty($_FILES['file']['name']))
        {
                $ins = "insert into users (username,cid,email,pass,interest,age,userimg,category) values('$user','$cid','$email','$pass','$interest',$age,'none','')";
		        if(mysqli_query($con,$ins))
		        {
		    	    echo "success";
		        }
		        else
		        {
		        	echo "not insert user datails1";
		        }
        }
        else
        {
            $img = $_FILES['file']['name'];
            $location = "img/".$img;
            if(move_uploaded_file($_FILES['file']['tmp_name'],$location))
            {
                $ins = "insert into users (username,cid,email,pass,userimg,interest,age,category) values('$user','$cid','$email','$pass','$interest',$age,'$img','')";
		        if(mysqli_query($con,$ins))
		        {
		    	    echo "success";
		        }
		        else
		        {
		        	echo "not insert file2";
		        }
            }
            else
            {
                echo "not insert3";
            }
        }
	    
    }
	
$con->close();
?>