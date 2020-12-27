<?php
session_start();
unset($_SESSION["u_id"]);
unset($_SESSION["uname"]);
header("Location:loginPage.php");
?>