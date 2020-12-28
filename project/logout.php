<?php
session_start();
unset($_SESSION["curr_uid"]);
unset($_SESSION["curr_uname"]);
header("Location:loginPage.php");
?>