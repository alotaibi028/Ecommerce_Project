<?php


$db_host = "localhost";
$db_username = "cottage_ecommerc";
$db_password = "ecommerce@123";
$db_name = "cottageindustryvirtualmarket_ecommerce";

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

mysqli_query($con,"set names 'utf8'");

if(!$con){
    die("Connection Failed:".mysqli_connect_errno());
}
?>
