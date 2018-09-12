<?php
session_start();
unset($_SESSION['user_array']);
header("location: ../index.php");

?>