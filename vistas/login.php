<?php

$LoginController = new Login_Controller;



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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          <div id="form-container" style="width: 23rem;">
            <!-- Login Form -->
            <form id="login-form" method="post">
              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="loginEmail" id="loginEmail" class="form-control form-control-lg" />
                <label class="form-label" for="loginEmail">Email address</label>
              </div>
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="loginpassword" id="loginPassword" class="form-control form-control-lg" />
                <label class="form-label" for="loginPassword">Password</label>
              </div>
              <div class="pt-1 mb-4">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" name="login" type="submit">Login</button>
              </div>
              <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
              <p>Don't have an account? <a href="#!" class="link-info" id="show-register">Register here</a></p>
            </form>

            <!-- Register Form -->
            <form id="register-form"  method="post" style="display: none;">
              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>
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
              <p>Already have an account? <a href="#!" class="link-info" id="show-login">Login here</a></p>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="person-training-athletics.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
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

</body>
</html>
