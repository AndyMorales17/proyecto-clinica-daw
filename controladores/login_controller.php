<?php
require_once("conexion.php");

Class Login_Controller extends Conexion {



    public function Create($user){


        $passwword=$user->getContraseña();
        $pass=$this->encriptar("encriptar", $passwword);
       

        $sql = "INSERT INTO users (usuario,contraseña, id_rol, fullname, direccion, telefono, correo) 
        VALUE ('{$user->getUsuario()}', '$pass', '{$user->getIdRol()}', '{$user->getFullname()}', '{$user->getDireccion()}',
        '{$user->getTelefono()}', '{$user->getCorreo()}')";

        $rs=$this->ejecutarSQL($sql); 
    }

}

?>