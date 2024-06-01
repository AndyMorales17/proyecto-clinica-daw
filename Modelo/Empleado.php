<?php

Class Empleado{

    Private $id_empleado;
    Private $Nombre;
    Private $Apellido;
    Private $Dirección;
    Private $Teléfono;
    Private $carnet;
    Private $correo;
    Private $Estado;

    public function __construct($id_emple="",$Nom="",$Ape="",$Dir="",$Tel="",$Car="",$correo="",$Esta=""){

        $this -> $id_empleado = $id_emple;
        $this -> $Nombre = $Nom;
        $this -> $Apellido = $Ape;
        $this -> $Dirección = $Dir;
        $this -> $Teléfono = $Tel;
        $this -> $carnet = $Car;
        $this -> $correo = $correo;
        $this -> $Estado = $Esta;
    }


        // getters
        public function getIdEmpleado() {
            return $this->id_empleado;
        }
    
        public function getNombre() {
            return $this->Nombre;
        }
    
        public function getApellido() {
            return $this->Apellido;
        }
    
        public function getDirección() {
            return $this->Dirección;
        }
    
        public function getTeléfono() {
            return $this->Teléfono;
        }
    
        public function getCarnet() {
            return $this->carnet;
        }
    
        public function getCorreo() {
            return $this->correo;
        }
    
        public function getEstado() {
            return $this->Estado;
        }


            // setters
    public function setIdEmpleado($id_emple) {
        $this->id_empleado = $id_emple;
    }

    public function setNombre($Nom) {
        $this->Nombre = $Nom;
    }

    public function setApellido($Ape) {
        $this->Apellido = $Ape;
    }

    public function setDirección($Dir) {
        $this->Dirección = $Dir;
    }

    public function setTeléfono($Tel) {
        $this->Teléfono = $Tel;
    }

    public function setCarnet($car) {
        $this->carnet = $car;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setEstado($Esta) {
        $this->Estado = $Esta;
    }



}

?>