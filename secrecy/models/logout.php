<?php
session_start();
session_destroy();
session_unset($_SESSION['user_name']);
header("location:../../index.php");

?>