<?php
   session_start();
   unset($_SESSION['username']);
   unset($_SESSION['password']);
   
   echo 'Has cerrado la sesión';
   session_destroy();
   header('Refresh: 2; URL = index.php');
?>