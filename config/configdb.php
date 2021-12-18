<?php
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','Juegos');

    //Nueva conexión mysqli 
    $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if($mysqli === false){
        die('Error al conectar con la base de datos'.$mysqli->connect_error);
    }
?>