<?php

$controler_producto = new ProductosController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ok1'])) {
        $imageFile = $_FILES['Imagen'];
        $imageData = file_get_contents($imageFile['tmp_name']);
        $imageBlob = base64_encode($imageData);
        $Producto = new Producto("", $_POST['id_categoria'], $_POST['id_proveedor'], $_POST['Nombre'], $_POST['Descripción'], $_POST['Precio'], $imageBlob, "");
        $controler_producto->agregar($Producto);
    }

    if (isset($_POST['ok3'])) {
        $Eliminar = $_POST['id'];
        $controler_producto->delete($Eliminar);
    }

    if (isset($_POST['modificar'])) {
        // Obtener los datos del formulario
        $id_producto = $_POST['id_producto'];
        $id_categoria = $_POST['id_categoria'];
        $id_proveedor = $_POST['id_proveedor'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $imageBlob = null;

        // Manejar la imagen si se ha subido una nueva
        if (isset($_FILES['Imagen']) && $_FILES['Imagen']['error'] === UPLOAD_ERR_OK) {
            $imageFile = $_FILES['Imagen'];
            $imageData = file_get_contents($imageFile['tmp_name']);
            $imageBlob = base64_encode($imageData);
        }

        $producto = new Producto($id_producto, $id_categoria, $id_proveedor, $nombre, $descripcion, $precio, $imageBlob, '');    
        $controler_producto->actualizar($producto);
    }
}

?>

<!-- HTML para mostrar los productos, agregar y editar productos -->
<section class="py-5 bg-light mt-5 mb-0">
    <div class="container mt-5">
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Agregar Producto
        </button>
    </div>

    <!-- Modal para agregar producto -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Agregar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="id_categoria" class="form-label">Seleccione categoria:</label>
                            <select class="form-control" name="id_categoria">
                                <option value="#">Seleccione una categoria</option>
                                <?php foreach ($controler_producto->categoria() as $categoria) : ?> 
                                <option value="<?php echo htmlspecialchars($categoria['id_categoria']); ?>"><?php echo htmlspecialchars($categoria['Nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_proveedor" class="form-label">Seleccione proveedor:</label>
                            <select class="form-control" name="id_proveedor">
                                <option value="#">Seleccione un proveedor</option>
                                <?php foreach ($controler_producto->proveedor() as $proveedor) : ?> 
                                <option value="<?php echo htmlspecialchars($proveedor['id_proveedor']); ?>"><?php echo htmlspecialchars($proveedor['Nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre del Producto</label>
                            <input type="text" class="form-control" name="Nombre" id="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="Descripción" class="form-label">Descripción</label>
                            <textarea class="form-control" name="Descripción" id="Descripción" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="Precio" id="Precio" required>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Imagen del Producto</label>
                            <input type="file" class="form-control" name="Imagen" id="Imagen" required accept="image/png, image/jpeg">
                        </div>
                        <button type="submit" name="ok1" class="btn btn-primary">Agregar Producto</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
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
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $producto['id_producto']; ?>" name="id">
                                        <button type="submit" name="ok3" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                                    </form>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $producto['id_producto']; ?>">
                                        Editar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal-<?php echo $producto['id_producto']; ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo $producto['id_producto']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post"  enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel-<?php echo $producto['id_producto']; ?>">Editar Producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                <div class="mb-3">
                                    <label for="edit-nombre-<?php echo $producto['id_producto']; ?>" class="form-label">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="edit-nombre-<?php echo $producto['id_producto']; ?>" name="nombre" value="<?php echo htmlspecialchars($producto['Nombre']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-descripcion-<?php echo $producto['id_producto']; ?>" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="edit-descripcion-<?php echo $producto['id_producto']; ?>" name="descripcion" required><?php echo htmlspecialchars($producto['Descripción']); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-precio-<?php echo $producto['id_producto']; ?>" class="form-label">Precio</label>
                                    <input type="text" class="form-control" id="edit-precio-<?php echo $producto['id_producto']; ?>" name="precio" value="<?php echo htmlspecialchars($producto['Precio']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-categoria-<?php echo $producto['id_producto']; ?>" class="form-label">Seleccione Categoría</label>
                                    <select class="form-control" id="edit-categoria-<?php echo $producto['id_producto']; ?>" name="id_categoria" required>
                                        <option value="#">Seleccione una categoría</option>
                                        <?php foreach ($controler_producto->categoria() as $categoria) : ?>
                                        <option value="<?php echo htmlspecialchars($categoria['id_categoria']); ?>" <?php if ($categoria['id_categoria'] == $producto['id_categoria']) echo 'selected'; ?>>
                                            <?php echo htmlspecialchars($categoria['Nombre']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-proveedor-<?php echo $producto['id_producto']; ?>" class="form-label">Seleccione Proveedor</label>
                                    <select class="form-control" id="edit-proveedor-<?php echo $producto['id_producto']; ?>" name="id_proveedor" required>
                                        <option value="#">Seleccione un proveedor</option>
                                        <?php foreach ($controler_producto->proveedor() as $proveedor) : ?>
                                        <option value="<?php echo htmlspecialchars($proveedor['id_proveedor']); ?>" <?php if ($proveedor['id_proveedor'] == $producto['id_proveedor']) echo 'selected'; ?>>
                                            <?php echo htmlspecialchars($proveedor['Nombre']); ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-imagen-<?php echo $producto['id_producto']; ?>" class="form-label">Imagen del Producto</label>
                                    <input type="file" class="form-control" id="edit-imagen-<?php echo $producto['id_producto']; ?>" name="imagen" accept="image/*">
                                    <small class="form-text text-muted">Subir una nueva imagen solo si deseas cambiarla.</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" name="modificar" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
