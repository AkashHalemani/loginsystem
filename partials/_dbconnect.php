<?php
$server = "127.0.0.1:3308";
$user = "root";
$pass = "";
$db = "user";
$conn = mysqli_connect($server,$user,$pass,$db);
if(!$conn)
{
    die("error");
}

?>