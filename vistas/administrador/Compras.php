<?php
$ControllerCompras = new ControllerCompras($conexion);

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
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Compras</h2>
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
                        Compras
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID Compra</th>
                                    <th>ID Usuario</th>
                                    <th>ID Producto</th>
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ControllerCompras->listar() as $compra): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($compra['id_compra']); ?></td>
                                    <td><?php echo htmlspecialchars($compra['usuario']); ?></td>
                                    <td><?php echo htmlspecialchars($compra['producto']); ?></td>
                                    <td><?php echo htmlspecialchars($compra['Fecha']); ?></td>
                                    <td><?php echo htmlspecialchars($compra['Cantidad']); ?></td>
                                    <td><?php echo htmlspecialchars($compra['precio']); ?></td>
                                    <td><?php echo htmlspecialchars($compra['total']); ?></td>
                                    
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
