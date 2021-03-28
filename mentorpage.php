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
        <div id="myModal" class="modal">
            <h1 style="margin-top: 20px;font-size:60px;text-align: center;"> <u>AdviceByte</u></h1>
            <a href="./login.php"><span class="close">Logout</span></a>
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
                    $q = "SELECT * FROM mentor WHERE mail='".$mail."'";
                    $res = $conn->query($q);
                    if ($res->num_rows>0)
                    {
                        while($r=$res->fetch_assoc())
                        {
                            echo "WELCOME " . strtoupper($r["Name"])."<br><br>";
                        }
                    }
                    
                    $query = "SELECT client.Name as Name,client.mail as mail, mentor.field as field from mentor inner join client on client.field=mentor.field and mentor.mail='" . $mail . "'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0)
                    {
                        echo("Clients available to deal with based on your field of expertise are as follows:");
                        while ($row = $result->fetch_assoc()) {
                            echo "<br><br>Client Name:   " . $row["Name"] . "<br>Mail id:   " . $row["mail"]."<br>Field:  ".$row["field"];
                        }
                    } else {
                        echo("<br>There are no clients available in your field of expertise");
                    }
                 ?>
                </p>
                <a href="https://discord.gg/5DhtYv6f" class='discordbtn' target="_blank">JOIN OUR DISCORD COMUNITY!!</a>
            </div>
        </div>
    </div>
</body>

</html>