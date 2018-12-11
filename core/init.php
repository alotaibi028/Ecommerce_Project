<?php
/**
 * Created by PhpStorm.
 * User: Hi
 * Date: 10/1/2018
 * Time: 10:08 PM
 */

$allowed_lang = array('english','arabic');
	/* whether $_GET exists isset(($_GET['lang']))*/
	/* check whether isset(($_GET['lang'])) returns true */
	/* checking whther the language in $_GET['lang'] is inside $allowed_lang */
if(isset($_GET['lang']) === true && in_array($_GET['lang'],$allowed_lang) === true){
    $_SESSION['lang'] = $_GET['lang'];
}

include 'lang/'.$_SESSION['lang'].'.php';
