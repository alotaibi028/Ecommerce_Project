<?php
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 8/2/2018
 * Time: 8:06 AM
 */

$db_host = "localhost";
$db_username = "root";
$db_password = "7606MA";
$db_name = "ecommerce_db";

$con = mysqli_connect($db_host,$db_username,$db_password,$db_name);

if(!$con){
    die("Connection Failed:".mysqli_connect_errno());
}
?>
