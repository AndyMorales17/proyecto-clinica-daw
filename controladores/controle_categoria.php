<?php
require_once("conexion.php");

class categoriacontroler extends Conexion {

    public function listar1() {
        $sql = "SELECT * 
        FROM Categoria 
        WHERE id_categoria=1";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
    public function listar2() {
        $sql = "SELECT * 
        FROM Categoria 
        WHERE id_categoria=2";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
    public function listar3() {
        $sql = "SELECT * 
        FROM Categoria 
        WHERE id_categoria=3";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }

    
    public function listar4() {
        $sql = "SELECT * 
        FROM Categoria 
        WHERE id_categoria=4";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
    public function listar5() {
        $sql = "SELECT * 
        FROM Categoria 
        WHERE id_categoria=5";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
    public function listar6() {
        $sql = "SELECT * 
        FROM Categoria 
        WHERE id_categoria=6";  
        $rs = $this->ejecutarSQL($sql);
        $resultado = array();
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }

        return $resultado;
    }
}