if (isset($_POST['login'])){
    $username = $_POST['loginEmail'];
    $password = $_POST['loginpassword'];

   
}

if (isset($_POST['registro'])){
   $username = $_POST['usuario'];
   $password = $_POST['password'];
   $nombre = $_POST['nombre'];
   $direccion = $_POST['direccion'];
   $telefono = $_POST['telefono'];
   $correo = $_POST['correo'];    

   
   $user = new Users ("", $_POST['usuario'], $_POST["password"],2,$_POST['nombre'],$_POST['direccion'],$_POST['telefono'], $_POST["correo"]);
   $LoginController->Create($user);

}

$user = $result->fetch_assoc();

            $stored_password = $this->encriptar('desencriptar', $user['contraseña']);
            if ($password == $stored_password) {
                return true;
            }



    if ($LoginController->validate($username, $password)) {
        
        echo "Credenciales.";
        exit();
    } else {
        echo "Credenciales de inicio de sesión inválidas.";
    }