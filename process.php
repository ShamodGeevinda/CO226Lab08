<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1234';
$dbname = 'lab9';
$mysqli =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$mysqli) {
    die('Could not connect: ' . mysqli_connect_error());
}

$name = "";
$price = "";
$update = false;
$id = 0;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $mysqli->query("INSERT INTO vehicle(name, price) VALUES ('$name', '$price')") or
        die($mysqli->error);

    header("Location: index.php");
}

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $mysqli->query("Delete from vehicle where id = $id") or
        die($mysqli->error);


    header("Location: index.php");
}

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("select * from vehicle where id = $id") or
        die($mysqli->error);
    if (count(array($result)) == 1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $price = $row['price'];
    }
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $mysqli->query("UPDATE vehicle set name = '$name', price = '$price' where id = $id ") or die($mysqli->error);

    header("Location: index.php");
}
