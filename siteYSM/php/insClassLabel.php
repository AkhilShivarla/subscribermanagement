
<?php 
    include 'connection.php';
    
    $email=$_POST['email'];
    $age = $_POST['age'];
    $interest = $_POST['interest'];
    $res_label = $_POST['res_label'];
    $tryes = $_POST['FTLabel'];//tryes
    $trno = $_POST['FNLabel'];//trno
    echo "hello";
    
    //$ins = "UPDATE classify_user SET technical_c='".$trno."' ,news_c='".$tryes."' WHERE age=".$age." and interest='".$interest."'";
    $ins="insert into classify_user (age,interest,technical_c,news_c) values($age,'$interest','$tryes','$trno')";
    $ins1 = "UPDATE users SET category='".$res_label."'  WHERE email='".$email."' and age=".$age." and interest='".$interest."'";
    //echo $ins;
    
		        if($con->query($ins))
		        {
		    	    echo "success ins into classify";
		        }
		        else
		        {
		        	echo "ins not inserted and classified";
		        }
		        if($con->query($ins1))
		        {
		    	    echo "users success ins1";
		        }
		        else
		        {
		        	echo "users ins1 not inserted and classified";
		        }
       
	
$con->close();
?>