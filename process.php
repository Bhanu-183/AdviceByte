<?php

$servername = "sql109.epizy.com";
  $username = "epiz_28239248";
  $password = "42cBG9MYx3";
  $conn = new mysqli($servername, $username, $password, "epiz_28239248_AdviceByte");
    if ($conn->connect_error) {
        echo '<script>alert("Connection failed")</script>';
        die("Connection failed: " . $conn->connect_error);
    }

// require_once('connection.php');

if(isset($conn,$_POST['submit-btn']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $field = mysqli_real_escape_string($conn,$_POST['field']);
//     $exp = mysqli_real_escape_string($con,$_POST['exp']);
    $mail = mysqli_real_escape_string($conn,$_POST['mail']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $password=htmlspecialchars(stripslashes(trim($_POST['password'])));
    $repassword=htmlspecialchars(stripslashes(trim($_POST['repassword'])));
//     $gender = mysqli_real_escape_string($con,$_POST['gender']);
    // echo $username , $mail , $phone , $gender;
    if(empty($name) || empty($mail) || empty($field) || empty($phone) || empty($password) || empty($repassword))
    {
        echo '<script>alert("Enter the all the fields")</script>';
        header("Refresh:0; url=mentorlogin.html");
    }
    if($password!=$repassword)
    {
        echo '<script>alert("Confirm password and password should be same")</script>';
        header("Refresh:0; url=mentorlogin.html");
    }
    else{
        $sql = "insert into mentor(Name,password,mail,phno,field)values('$name','$password','$mail','$phone','$field')";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            session_start();
            $_SESSION['mail'] = $mail;
            header('Location:./mentorpage.php');
        }
        else{
            echo($conn->error);
        }
    }


}


?>
