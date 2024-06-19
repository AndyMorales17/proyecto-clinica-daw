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

 
    public function validate($username, $password) {
        // Ejemplo de consulta preparada para evitar SQL Injection
        $sql = "SELECT * FROM users WHERE correo = '$username'";

        $rs=$this->ejecutarSQL($sql); 
        
    
        if ($rs && $rs->num_rows > 0) {
            $user = $rs->fetch_assoc();
            $stored_password = $this->encriptar('desencriptar', $user['contraseña']);
                if ($password == $stored_password) {
                    return $user;  // Devuelve el usuario completo si las credenciales son válidas
                }
            
        }
        return false;
    }

    // Método para manejar el inicio de sesión
    public function handleLogin($correo, $contraseña) {
        // Validar las credenciales
        $user = $this->validate($correo, $contraseña);

        if ($user) {
            // Iniciar sesión
            $_SESSION['usuario'] = $correo;
            $_SESSION['id_rol'] = $user['id_rol'];
            $_SESSION['id'] = $user['id'];

            header("Location: http://localhost/proyecto-clinica-daw/ ");


        } else {

            echo "<script>alert('Los datos no son correctos vuelva a invtentar');</script>";
            header("Location: http://localhost/proyecto-clinica-daw/ ");
            //exit;
        }
        



}
}

?>

