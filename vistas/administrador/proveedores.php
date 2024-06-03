    <?php
      $controlador_proveedor= new controler_proveedor();
      $proveedores = $controlador_proveedor->listar();



if(isset($_POST['ok1'])) {

    $Nom = $_POST['nombre'];
    $Dir = $_POST['direccion'];
    $Tel = $_POST['telefono'];
    $proveedor = new Proveedor("", $Nom, $Dir, $Tel);
    $controler_proveedor->agregar($proveedor);

}
?>
    <style>
        .data-table-container {
            margin: 20px auto;
            max-width: 1200px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Portfolio Section-->
    <section class="page-section portfolio mt-5 mb-5" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">PROVEEDORES</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            
            <div class="container mt-5">
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
        Agregar Proveedor
    </button>
</div>

<!-- Modal para agregar proveedor -->
<div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierModalLabel">Agregar Nuevo Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="addSupplierForm" action="add_supplier.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Proveedor</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" required>
                    </div>
                    <button type="submit" name="ok1" class="btn btn-primary">Agregar Proveedor</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
            
            <div class="container mt-3">
        <div class="data-table-container">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Proveedores 
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Proveedor</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($proveedores as $proveedor): ?>
                      <tr>
                    <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Nombre']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Dirección']); ?></td>
                    <td><?php echo htmlspecialchars($proveedor['Teléfono']); ?></td>
                        </tr>
                        <?php endforeach; ?>                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script>
                window.addEventListener('DOMContentLoaded', event => {
                    const datatablesSimple = document.getElementById('datatablesSimple');
                    if (datatablesSimple) {
                        new simpleDatatables.DataTable(datatablesSimple, {
                            labels: {
                                placeholder: "Buscar...",
                                perPage: "resultados por página",
                                noRows: "No hay resultados",
                                info: "Mostrando {start} a {end} de {rows} resultados"

                            }
                        });
                    }
                });
            </script>
    

    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        <?php 
            require_once("pie.php");
        ?>
    </footer>
















































