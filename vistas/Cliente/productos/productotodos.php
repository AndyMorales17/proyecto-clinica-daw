<?php
$controler_producto = new ProductosController();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if (isset($_POST['agregarcar'])) {
    $producto_id = $_POST['id'];
    
    // Si el producto no está en el carrito, inicializa su cantidad a 0
    if (!isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] = 0;
    }    
    // Incrementa la cantidad del producto en el carrito
    $_SESSION['carrito'][$producto_id]++;

    // header('Location: pagina_del_carrito.php');
}




?>

<!-- HTML para mostrar los productos, agregar y editar productos -->
<section class="py-5 bg-light mt-5 mb-0">
<div class="container mt-5">
        <a href="categoria2" class="btn btn-dark">Regresar a categoria</a>
    </div>
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
                            <form method="post">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['id_producto']; ?>">
                                <input type="hidden" name="producto_id" value="<?php echo $producto['Precio']; ?>">
                                <form method="post">
                                        <input type="hidden" value="<?php echo $producto['id_producto']; ?>" name="id">
                                        <button type="submit" name="agregarcar" class="btn btn-info" data-bs-dismiss="modal">Agregar al Carrito</button>
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
                    </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
