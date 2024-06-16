


    if ($LoginController->validate($username, $password)) {
        
        echo "Credenciales.";
        exit();
    } else {
        echo "Credenciales de inicio de sesión inválidas.";
    }