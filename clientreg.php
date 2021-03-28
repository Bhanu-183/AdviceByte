<?php
$servername = "sql109.epizy.com";
$username = "epiz_28239248";
$password = "42cBG9MYx3";
$conn = new mysqli($servername, $username, $password, "epiz_28239248_AdviceByte");
    if ($conn->connect_error) {
        echo '<script>alert("Connection failed")</script>';
        die("Connection failed: " . $conn->connect_error);
    }
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$u=$fname.' '.$lname;
$f=$_POST['fld'];
$mail = htmlspecialchars(stripslashes(trim($_POST['mailid'])));
$p=htmlspecialchars(stripslashes(trim($_POST['password'])));
$rp=htmlspecialchars(stripslashes(trim($_POST['repassword'])));
if($p!=$rp)
{
	echo '<script>alert("confirm password and password should be same")</script>';
    header("Refresh:0; url=clientlogin.php");
}
else
{
    $q = "SELECT * FROM client WHERE mail='" . $mail . "' ";
    $res = $conn->query($q);
    if ($res->num_rows > 0)
    {
        echo '<script>alert("MAIL ID ALREADY EXIST TRY ANOTHER")</script>';
        header("Refresh:0; url=clientlogin.php");
    }
    else
    {
	    if(!empty($u) || !empty($p) || !empty($mail) || !empty($f))
	    {
		    $insert="insert into client(Name,password,mail,field) values('$u','$p','$mail','$f')";
		    if($conn->query($insert)==TRUE)
		    {
                session_start();
                $_SESSION['mail'] = $mail;
			    header('Location:./clientmain.php');
		    }
		    else
		    {
			    echo '<script>alert(Error: " . $sql . "<br>" . $con->error)</script>';
		    }
	    }
    }
}
?>
