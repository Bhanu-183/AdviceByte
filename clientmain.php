<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mainpagestyle.css">
    <link href="https://fonts.google.com/specimen/Alata:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    
    <title>Welcome</title>
</head>

<body>
    <div class="opt-mob">
        <i class="fas fa-bars" style="font-size:30px;color:white;" id="opt"></i>
        <div class="modal">
            <h1 style="margin-top: 20px;font-size:60px;text-align: center;"> <u>AdviceByte</u></h1>
            <a href="./clientlogin.php"><span class="close">Logout</span></a>
            <div class="modal-content" style="margin-top: 10px;">
                <p>
                    <?php
                    session_start();
                    $mail = $_SESSION['mail'];
                    $servername = "sql109.epizy.com";
                    $username = "epiz_28239248";
                    $password = "42cBG9MYx3";
                    $conn = new mysqli($servername, $username, $password, "epiz_28239248_AdviceByte");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $q = "SELECT * FROM client WHERE mail='".$mail."'";
                    $res = $conn->query($q);
                    if ($res->num_rows>0)
                    {
                        while($r=$res->fetch_assoc())
                        {
                            echo "WELCOME " . strtoupper($r["Name"])."<br><br>";
                        }
                    }
                    
                    $query = "SELECT m.Name as Name, m.mail as mentor,m.phno as phone, c.field as field from client as c inner join mentor as m on c.field=m.field and c.mail='" . $mail . "'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0)
                    {
                        echo("Mentor available for your field of intrest are as follows:");
                        while ($row = $result->fetch_assoc()) {
                            echo "<br><br>Mentor Name:   " . $row["Name"] . "<br>Mail id:   " . $row["mentor"]."<br>Phno:  ".$row["phone"]."<br>Field:  ".$row["field"];
                        }
                    } else {
                        echo("<br>Sorry!!There are no mentors available in your field of interest");
                    }
                 ?>
                </p>
                <a href="https://discord.gg/5DhtYv6f" class="discordbtn" target="_blank">JOIN OUR DISCORD COMUNITY!!</a>
            </div>
        </div>
    </div>
</body>

</html>