<?php


$db_host = "localhost";
$db_username = "root";
$db_password = "7606MA";
$db_name = "ecommerce_db";

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

if(!$con){
    die("Connection Failed:".mysqli_connect_errno());
}
?>
