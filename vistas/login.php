<?php

$login_Controller = new Login_Controller();


if (isset($_POST["login"])) {
  $correo = $_POST["loginEmail"];
  $contraseña = $_POST["loginpassword"];
  
  echo "<script>alert('El correo es $correo y la contraseña $contraseña.');</script>";

  $login_Controller->handleLogin($correo, $contraseña);

}

if (isset($_POST['registro'])) {
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $user = new Users("", $username, $password, 2, $nombre, $direccion, $telefono, $correo);
    $LoginController=new Login_Controller();
    $LoginController->Create($user);
    echo "<script> alert('Usuario registrado exitosamente.');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />

    <style>
        .bg-image-vertical {
            position: center;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
    </style>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">
        <div class="px-5 ms-xl-4 d-flex align-items-center" style="padding-top: 10px;">
          <div class="navbar-brand d-flex align-items-center"> 
            <img src="assets/img/hospital1.png" alt="Logo" style="height: 40px; margin-right: 10px;">
            <span class="h1 fw-bold mb-0">FARMACIA MAZAPAN</span>
          </div>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-3">
          <div id="form-container" style="width: 23rem;">

            <!-- Login Form -->
            <form id="login-form" method="post">
              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ingresar Credenciales</h3>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="loginEmail">Correo</label>
                <input type="text" name="loginEmail" id="loginEmail" class="form-control form-control-lg" />
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="loginPassword">Contraseña</label>
                <input type="password" name="loginpassword" id="loginPassword" class="form-control form-control-lg" />
              </div>
              <div class="pt-1 mb-5">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" name="login" type="submit">Ingresar</button>
              </div>
              
              <p>Aun no tiene cuenta? <a href="#!" class="link-info" id="show-register">Registrate</a></p>
            </form>

            <!-- Register Form -->
            <form id="register-form" method="post" style="display: none;">
              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registrarte</h3>
              <div class="form-outline mb-4">
                <input type="text" name="usuario" id="registerUsuario" class="form-control form-control-lg" />
                <label class="form-label" for="registerUsuario">Usuario</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" name="password" id="registerPassword" class="form-control form-control-lg" />
                <label class="form-label" for="registerPassword">Contraseña</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name="nombre" id="registerFullname" class="form-control form-control-lg" />
                <label class="form-label" for="registerFullname">Nombre Completo</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name="direccion" id="registerDireccion" class="form-control form-control-lg" />
                <label class="form-label" for="registerDireccion">Dirección</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" name="telefono" id="registerTelefono" class="form-control form-control-lg" />
                <label class="form-label" for="registerTelefono">Teléfono</label>
              </div>
              <div class="form-outline mb-4">
                <input type="email" name="correo" id="registerCorreo" class="form-control form-control-lg" />
                <label class="form-label" for="registerCorreo">Correo Electrónico</label>
              </div>
              <div class="pt-1 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" name="registro" type="submit" id="register-button">Registrar</button>
              </div>
              <p>Ya tienes contraseña? <a href="#!" class="link-info" id="show-login">Regresar al login</a></p>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="images.png" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

<script>
  document.getElementById('show-register').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
  });

  document.getElementById('show-login').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('register-form').style.display = 'none';
    document.getElementById('login-form').style.display = 'block';
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
