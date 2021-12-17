<?php
    require 'php/configdb.php';
    class OperacionesBD{
        private $conexion;
        public $resultado;
        
        function __construct(){
            $this->conexion=new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }
        function consulta($consulta){
            $this->resultado=$this->conexion->query($consulta);
        }
        function error(){
            if($this->conexion->errno=='1062')
                return '<div class="error"><p>El Email introducido ya existe</p></div>';
            if($this->conexion->errno=='1406')
                return '<div class="error"><p>Datos demasiado largos para la columna</p></div>';
            return $this->conexion->errno.$this->conexion->error;
        }
    
        function fila_array(){
            return $this->resultado->fetch_array();
        }
        function fila_assoc(){
            return $this->resultado->fetch_assoc();
        }
        function id_anterior(){
            return $this->conexion->insert_id;
        }
    }