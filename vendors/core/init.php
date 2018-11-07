<?php
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 10/1/2018
 * Time: 10:08 PM
 */

$allowed_lang = array('english','arabic');

if(isset($_GET['lang']) === true && in_array($_GET['lang'],$allowed_lang) === true){
    $_SESSION['lang'] = $_GET['lang'];
}

include '../lang/'.$_SESSION['lang'].'.php';
