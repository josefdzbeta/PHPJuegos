<?php
    require 'php/configdb.php';
    class OperacionesBD{
        private $conexion;
        public $resultado;
        public function __construct(){
            $this->conexion=new mysqli(HOSTNAME, USERNAME, PW, DB);
        }
        public function consulta($consulta){
            $this->resultado=$this->conexion->query($consulta);
        }
        public function error(){
            if($this->conexion->errno=='1062')
                return '<div class="datos"><p>El DNI introducido ya existe</p></div>';
            if($this->conexion->errno=='1406')
                return '<div class="datos"><p>Uno de los campos introducidos supera el límite de caracteres</p></div>';
            return $this->conexion->errno.'--'.$this->conexion->error;
        }
        public function posicionArray($num){
            return $this->resultado->data_seek($num);
        }
        public function fila_array(){
            return $this->resultado->fetch_array();
        }
        public function fila_assoc(){
            return $this->resultado->fetch_assoc();
        }
        public function id_anterior(){
            return $this->conexion->insert_id;
        }
    }