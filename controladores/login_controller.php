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

   // public function login($usuario){
   //     $sql = "SELECT * FROM Users WHERE correo = '".$usuario->getCorreo()."' AND contraseña = '".$usuario->getContraseña()."';";
   //     $rs=$this->ejecutarSQL($sql);
   //     $resultado=array();
   //     while($fila=$rs->fetch_assoc()){
   //         $resultado[]=new Users("","",$fila["contraseña"],"","","","",$fila["correo"]);
   //     }
   //     return $resultado;
   // }
 
    public function validate($username, $password) {
        $sql = "SELECT * FROM users WHERE correo = '".$username->getCorreo()."'";
        $result = $this->ejecutarSQL($sql);
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $pass=$user['contraseña'];
            $stored_password = $this->encriptar('desencriptar',$pass);
            if ($password == $stored_password) {
                return true;
            }
        }
        return false;
    }
}


?>

