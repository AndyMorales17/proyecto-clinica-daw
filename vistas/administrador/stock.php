<?php
$ControllerStock = new ControllerStock();

if (isset($_POST['ok1'])) {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    $ControllerStock->cantidad($id, $cantidad);

    if ($cantidad > 0) {
    $ControllerStock->estado($id);
}
if ($cantidad <= 0) {
    $ControllerStock->cero($id);
}
}
?>    
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        .data-table-container {
            margin: 20px auto;
            max-width: 1200px;
        }
    </style>

    <section class="page-section portfolio mt-5 mb-5" id="portfolio">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">STOCK</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="container mt-3">
                <div class="data-table-container">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Stock de Productos
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre Producto</th>
                                        <th>Categoria</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>     
                                        <th></th>                          
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ControllerStock->listar() as $stock): ?>
                                        <tr>
                                          <td><?php echo htmlspecialchars($stock['Nombre']); ?></td>
                                          <td><?php echo htmlspecialchars($stock['Categoria']); ?></td>
                                          <td><?php echo htmlspecialchars($stock['Cantidad']); ?></td>
                                          <td>
                                              <?php
                                              if ($stock['Estado'] == 0) {
                                                  echo '<span style="color: red;">Agotado</span>';
                                              } else {
                                                  echo '<span style="color: green;">Existente</span>';
                                              }
                                              ?>
                                          </td>
                                          <td class="text-center align-middle">
                                              <button class="btn btn-outline-info" onclick="openEditModal('<?php echo htmlspecialchars($stock['id_stock']); ?>', '<?php echo htmlspecialchars($stock['Nombre']); ?>', '<?php echo htmlspecialchars($stock['Cantidad']); ?>')">Agregar Cantidad</button>
                                          </td>
                                      </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Agregar cantidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editCantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="editCantidad" name="cantidad" required min="0">
                        </div>
                        <button type="submit" name="ok1" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id, nombre, cantidad) {
            document.getElementById('editId').value = id;
            document.getElementById('editCantidad').value = cantidad;
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('editForm').addEventListener('submit', function(event) {
            var cantidadInput = document.getElementById('editCantidad');
            var cantidad = parseInt(cantidadInput.value, 10);

            if (cantidad < 0) {
                alert('La cantidad no puede ser menor que 0.');
                event.preventDefault(); // Evita que el formulario se envíe
            }
        });
    });
</script>

