<?php
$controler_producto = new ProductosController();
$num=6;
if(isset($_POST['ok1'])){
    $imageFile = $_FILES['Imagen'];
    $imageData = file_get_contents($imageFile['tmp_name']);
    $imageBlob = base64_encode($imageData);
    $Producto = new Producto ("",$_POST['id_categoria'],$_POST['id_proveedor'],$_POST['Nombre'], $_POST['Descripción'], $_POST['Precio'], $imageBlob,"");

    $controler_producto->agregar($Producto);
}
?>


<?php


if(isset($_POST['ok3'])){

    $Eliminar = $_POST['id'];
    $controler_producto->delete($Eliminar);
}
?>

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
                    <form id="addProductForm"  method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                     <label for="id_categoria" class="form-label">Categoria:</label>
                     <select class="form-control" name="id_categoria">
                    
                     <?php foreach ($controler_producto->categoria() as $categoria) :?>
                    <?php if ($categoria['id_categoria'] == $num) :?>
                    <option value="<?php echo htmlspecialchars($categoria['id_categoria']);?>"><?php echo htmlspecialchars($categoria['Nombre']);?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                    </select>
                     </div>   

                     <div class="mb-3">
                     <label for="id_proveedor" class="form-label">Seleccione proveedor:</label>
                     <select class="form-control" name="id_proveedor">
                     <option value="#">Seleccione un proveedor</option>
                     <?php foreach ($controler_producto->proveedor() as $proveedor) :?> 
                     <option value="<?php echo htmlspecialchars($proveedor['id_proveedor']); ?>"><?php echo htmlspecialchars($proveedor['Nombre']); ?></option>
                     <?php endforeach;?>
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
                            <label for="productImage" class="form-label">URL de la Imagen</label>
                            <input type="file" class="form-control" name="Imagen" id="Imagen" required accept="image/png/jpg">
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
        <?php foreach ($controler_producto->listar($num) as $producto): ?>
    <div class="col mb-5">
        <div class="card h-100">
            <?php
            $imageBlob = $producto['Imagen'];
            $imageData = base64_decode($imageBlob);
            ?>
            <!-- Imagen del producto -->
            <img class="card-img-top" src="data:image/jpeg;base64,<?php echo base64_encode($imageData); ?>" alt="Imagen de <?php echo htmlspecialchars($producto['Nombre']); ?>" />
            <!-- Detalles del producto -->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Nombre del producto -->
                    <h5 class="fw-bolder"><?php echo htmlspecialchars($producto['Nombre']); ?></h5>
                    <!-- Precio del producto -->
                    $<?php echo number_format($producto['Precio'], 2); ?>
                </div>
            </div>
            <div class="text-center mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal-<?php echo $producto['id_producto']; ?>">
                    Mostrar Información del Producto
                </button>
            </div>
            <!-- Modal para mostrar información del producto -->
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
                            <form method=post><input type='hidden' value="<?php echo $producto['id_producto'];?>" name='id'>
                            <button type="submit" name="ok3" class="btn btn-primary" data-bs-dismiss="modal">Eliminar</button>
                            </form>
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
