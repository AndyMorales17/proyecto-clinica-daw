
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear Cuenta</h3></div>
                                <div class="card-body">
                                    <form action="register.php" method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="Nombre" type="text" placeholder="Ingresa tu nombre" required />
                                                    <label for="inputFirstName">Nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputLastName" name="Apellido" type="text" placeholder="Ingresa tu apellido" required />
                                                    <label for="inputLastName">Apellido</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="correo" type="email" placeholder="nombre@ejemplo.com" required />
                                            <label for="inputEmail">Correo Electrónico</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" name="contrasella" type="password" placeholder="Crea una contraseña" required />
                                                    <label for="inputPassword">Contraseña</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirma la contraseña" required />
                                                    <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPhone" name="Telefono" type="text" placeholder="Ingresa tu número telefónico" />
                                            <label for="inputPhone">Teléfono</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputCarnet" name="carnet" type="number" placeholder="Ingresa el número de tu carnet" />
                                            <label for="inputCarnet">Carnet</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputCargo" name="cargo" type="text" placeholder="Ingresa tu cargo" />
                                            <label for="inputCargo">Cargo</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEstado" name="Estado" type="text" placeholder="Ingresa el estado" />
                                            <label for="inputEstado">Estado</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Crear Cuenta</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">¿Ya tienes una cuenta? Inicia sesión</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

