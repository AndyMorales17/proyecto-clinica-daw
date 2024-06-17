<?php
$ControllerProveedor = new controler_proveedor();

if (isset($_POST['ok1'])) {
    $Proveedor = new Proveedor("", $_POST['Nombre'], $_POST['Dirección'], $_POST['Teléfono']);
    $ControllerProveedor->agregar($Proveedor);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id_proveedor = $_POST['id'];
    if (isset($_POST['eliminar'])) {
        $ControllerProveedor->eliminar($id_proveedor);
    } 
        if (isset($_POST['actualizar'])) {
        $Proveedor = new Proveedor($id_proveedor, $_POST['nombre'], $_POST['direccion'], $_POST['telefono']);
        $ControllerProveedor->actualizar($Proveedor);
    }
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

<section class="page-section portfolio mt-5 mb-5" id="portfolio">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">PROVEEDORES</h2>
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>

        <div class="container mt-5">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplierModal">
                Agregar Proveedor
            </button>
        </div>

        <div class="modal fade" id="addSupplierModal" tabindex="-1" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSupplierModalLabel">Agregar Nuevo Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addSupplierForm" method="post">
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Nombre del Proveedor</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="Dirección" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="Dirección" id="Dirección" required>
                            </div>
                            <div class="mb-3">
                                <label for="Teléfono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="Teléfono" id="Teléfono" required>
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ControllerProveedor->listar() as $proveedor): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['Dirección']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['Teléfono']); ?></td>
                                    <td>
                                        <form method="post" style="display:inline-block;">
                                            <input type="hidden" value="<?php echo htmlspecialchars($proveedor['id_proveedor']); ?>" name="id">
                                        <button name="eliminar" class="btn btn-outline-danger">Eliminar</button>
                                        </form>
                                        <button class="btn btn-outline-info" onclick="openEditModal('<?php echo htmlspecialchars($proveedor['id_proveedor']); ?>', '<?php echo htmlspecialchars($proveedor['Nombre']); ?>', '<?php echo htmlspecialchars($proveedor['Dirección']); ?>', '<?php echo htmlspecialchars($proveedor['Teléfono']); ?>')">Editar</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="mb-3">
                        <label for="edit-nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit-nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="edit-direccion" name="direccion" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="edit-telefono" name="telefono" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="actualizar" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
        <script>
    function openEditModal(id, nombre, direccion, telefono) {
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-nombre').value = nombre;
    document.getElementById('edit-direccion').value = direccion;
    document.getElementById('edit-telefono').value = telefono;
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
    }
    </script>

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
    </div>
</section>
