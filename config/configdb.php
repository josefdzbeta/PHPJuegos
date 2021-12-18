<?php
    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','Juegos');

    //Nueva conexión mysqli 
    $db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

    if($db === false){
        die('Error al conectar con la base de datos'.$db->connect_error);
    }
?>