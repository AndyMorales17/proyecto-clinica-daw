<?php
session_start();

$controler_producto = new ProductosController();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['agregarcar'])) {
    $producto_id = $_POST['id_producto'];
    if (!isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] = 0;
    }
    $_SESSION['carrito'][$producto_id]++;
    header('Location: carrito.php');
    exit();
}
?>

<!-- HTML para mostrar los productos, agregar y editar productos -->
<section class="py-5 bg-light mt-5 mb-0">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">PRODUCTOS</h2>
        <div class="row row-cols-1 row-cols-md-4 g-3">
            <?php foreach ($controler_producto->todos() as $producto): ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <?php
                        $imageBlob = $producto['Imagen'];
                        $imageData = base64_decode($imageBlob);
                        ?>
                        <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($imageData); ?>" alt="Imagen de <?php echo htmlspecialchars($producto['Nombre']); ?>" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?php echo htmlspecialchars($producto['Nombre']); ?></h5>
                                $<?php echo number_format($producto['Precio'], 2); ?>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal-<?php echo $producto['id_producto']; ?>">
                                Mostrar Información del Producto
                            </button>
                        </div>
                        <div class="text-center mb-3">
                            <form action="carrito.php" method="post">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id_producto']; ?>">
                                <button type="submit" class="btn btn-info" name="agregarcar">
                                    Agregar al Carrito
                                </button>
                            </form>
                        </div>
                        <div class="modal fade" id="productModal-<?php echo $producto['id_producto']; ?>" tabindex="-1" aria-labelledby="productModalLabel-<?php echo $producto['id_producto']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel-<?php echo $producto['id_producto']; ?>">Información del Producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nombre del Producto:</strong> <?php echo htmlspecialchars($producto['Nombre']); ?></p>
                                        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($producto['Descripción']); ?></p>
                                        <p><strong>Precio:</strong> $<?php echo htmlspecialchars($producto['Precio']); ?></p>
                                        <p><strong>Nombre del proveedor:</strong> <?php echo htmlspecialchars($producto['ProveedorNombre']); ?></p>
                                        <p><strong>Categoria:</strong> <?php echo htmlspecialchars($producto['CategoriaNombre']); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
