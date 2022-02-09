<html>

<head>
    <title>Connecting MySQL Server</title>
</head>

<body>
    <?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '1234';
    //$dbname = 'lab9';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }
    echo 'Connected successfully';



    mysqli_close($conn);
    ?>
</body>

</html>