<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo 'Has cerrado la sesión';
   header('Refresh: 2; URL = inicio.php');
?>