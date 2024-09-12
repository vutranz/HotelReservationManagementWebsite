<?php
     session_start();
     unset($_SESSION["username"]);
     header('Refresh: 2; URL = FormLogin.php');
?>