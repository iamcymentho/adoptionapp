<?php
//import user file
include_once("shared/user.php");

//create object of user class
$obj = new User();

#refernce logout function
$obj->adminlogout();


?>