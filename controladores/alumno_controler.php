<?php
require_once("conexion.php");

class alumno_controler extends Conexion{

    public function listar() {
        $sql = "SELECT * FROM alumnoej";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array(); 
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }
    
        return $resultado; 
    }
    public function listarf() {
        $sql = "SELECT idalumno,nombre,sexo FROM alumnoej WHERE sexo='F'";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array(); 
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }
    
        return $resultado; 
    }
    
    public function listarM() {
        $sql = "SELECT idalumno,nombre,sexo FROM alumnoej WHERE sexo='M'";
        $rs = $this->ejecutarSQL($sql);
        $resultado = array(); 
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }
    
        return $resultado; 
    }
}
?>