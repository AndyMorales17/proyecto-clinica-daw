<?php
class contenido
{

    public function mostra_archivo()
    {
        require_once("conexion.php");


        $url=isset($_GET["url"])? $_GET["url"]:null;
        $url=explode("/",$url);
        $id = end($url); 
        $pagina="";
        
        if($url[0]==null){
            $pagina="vistas/inicio.php";}
      elseif ($url[0] == "estado") {
            $pagina = "vistas/administrador/menuadmin";
        }elseif ($url[0] == "alumno") {
            $pagina = "vistas/administrador/alumno.php";
        }  
        elseif ($url[0] == "Buzon") {
            $pagina = "vistas/administrador/buzon.php";
        }  
        elseif ($url[0] == "grafica") {
            $pagina = "vistas/administrador/alumnosgrafica.php";
        }  
        elseif ($url[0] == "mujeres") {
            $pagina = "vistas/administrador/mujeres.php";
        }  
        elseif ($url[0] == "hombres") {
            $pagina = "vistas/administrador/Hombres.php";
        } 
        else {
           
        }

        return $pagina;
    }
}
