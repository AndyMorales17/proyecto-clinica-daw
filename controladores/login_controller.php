<?php
require_once("conexion.php");

Class Login_Controller extends Conexion {



    public function Create($user){


        $passwword=$user->getContraseña();
        $pass=$this->encriptar("encriptar", $passwword);
       

        $sql = "INSERT INTO Users (usuario,contraseña, id_rol, fullname, direccion, telefono, correo) 
        VALUE ('{$user->getUsuario()}', '$pass', '{$user->getIdRol()}', '{$user->getFullname()}', '{$user->getDireccion()}',
        '{$user->getTelefono()}', '{$user->getCorreo()}')";

        $rs=$this->ejecutarSQL($sql); 
    }

    public function login($usuario){
        $sql = "SELECT * FROM Users WHERE correo = '".$usuario->getCorreo()."' AND contraseña = '".$usuario->getContraseña();."'";
       
        
        //$sql = "SELECT * FROM Users WHERE usuario='".$_POST['usuario']."' AND contraseña='".$_POST['contraseña'];
        //$rs=$this->ejecutarSQL($sql);


    }
 
    //public function validate($username, $password) {
    //    $sql = "SELECT * FROM users WHERE correo = '$username'";
    //    $result = $this->ejecutarSQL($sql);
    //
    //    if ($result->num_rows > 0) {
    //        $user = $result->fetch_assoc();
    //        $pass=$user['contraseña'];
    //        $stored_password = $this->encriptar('desencriptar',$pass);
    //        if ($password === $stored_password) {
    //            return true;
    //        }
    //    }
    //    return false;
    //}
}


?>

