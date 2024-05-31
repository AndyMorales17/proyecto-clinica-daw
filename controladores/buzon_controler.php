<?php
require_once("conexion.php");

class buzon_controler extends Conexion{

    public function listar() {
        $sql = "SELECT fechaup, COUNT(*) AS num_entregas
        FROM buzonpracticas
        GROUP BY fechaup
        ORDER BY num_entregas DESC
        LIMIT 10;";

        $rs = $this->ejecutarSQL($sql);
        $resultado = array(); 
        while ($fila = $rs->fetch_assoc()) {
            $resultado[] = $fila;
        }
    
        return $resultado; 
    }
    
    
}
?>