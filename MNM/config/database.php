<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "miussa";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    exit("Không kết nối được CSDL: " . mysqli_connect_error());
}
?>