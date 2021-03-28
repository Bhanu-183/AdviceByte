<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="loginst.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "sql109.epizy.com";
  $username = "epiz_28239248";
  $password = "42cBG9MYx3";
  $conn = new mysqli($servername, $username, $password, "epiz_28239248_AdviceByte");
    if ($conn->connect_error) {
        echo '<script>alert("Connection failed")</script>';
        die("Connection failed: " . $conn->connect_error);
    }
    $mail = test_input($_POST["mail"]);
    $pass = test_input($_POST["pass"]);
    $q = "SELECT * FROM mentor WHERE mail='" . $mail . "' ";
    $res = $conn->query($q);
    if ($res->num_rows == 0) {
        echo '<script>alert("PLEASE ENTER VAILD MAIL ID")</script>';
    } else {
        $query = "SELECT * FROM mentor WHERE mail='" . $mail . "' AND password='" . $pass . "'";
        $result = $conn->query($query);
        if ($result->num_rows == 0) {
            echo '<script>alert("INCORRECT PASSWORD TRY AGAIN!!")</script>';
        }
        else
        {
            session_start();
            $_SESSION['mail'] = $mail;
            header('Location:./mentorpage.php');
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<body>

    <div class="container">
        <div class="title">Login</div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email Id</span>
                    <input type="text" name="mail" placeholder="Enter your email id" required>
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pass" placeholder="Enter your password" required>
                </div>
            </div>

            <div class="button">
                <input type="submit" value="Login" name="submit" id="submit">
                <input type=button onClick="location.href='mentorlogin.html'" value='New user?     Register' style="margin-top:10px">
            </div>
                <button type="button" class="btn btn-block btn-success" onClick="location.href='index.html'" style="margin-top:50px;margin-top:60px;color:white;font-weight:bold">HOME</button>

        </form>


        <div id="vanta-canvas"></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
        <script type="text/javascript">
            VANTA.FOG({
                el: "#vanta-canvas",
                mouseControls: true,
                touchControls: true,
                gyroControls: false,
                minHeight: 200.00,
                minWidth: 200.00,
                highlightColor: 0x1da0a9,
                midtoneColor: 0x36a9d9,
                lowlightColor: 0x6d16c5,
                baseColor: 0xffffff
            })
        </script>
    </div>
</body>

</html>
