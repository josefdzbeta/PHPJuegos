<?php
   ini_set('display_errors', 1);
   error_reporting(~0);
   include('config/configdb.php');
   session_start();
   
   $usuario = $_SESSION['inicioUsuario'];

   $sql = mysqli_query($db,"SELECT correo FROM Usuarios WHERE correo = '$usuario' ");
   
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   
   $sesionInicio = $row['correo'];
   
   if(!isset($_SESSION['inicioUsuario'])){
      header("location: registro.html");
      die();
   }
?>