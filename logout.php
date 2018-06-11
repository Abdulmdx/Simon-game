<?php
session_start(); // start session
session_unset(); // destroy session variable
session_destroy(); // destroy session data
header("Location: Login.php"); //travel to login page

?>