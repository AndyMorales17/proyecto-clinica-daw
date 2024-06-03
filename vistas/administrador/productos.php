<?php
$controler_producto = new ProductosController();

if(isset($_POST["ok1"])){
       
$id_categoria=$_POST['idcategoria'];
$Nombre=$_POST['nombre'];
$Descripcion=$_POST['descripcion'];
$Precio=$_POST['precio'];
$Imagen=$_POST['estado'];
$Estado=$_POST['imagen'];
    

<<<<<<< HEAD
if(isset($_POST['ok1'])){


       
    $Producto = new Producto ("",$_POST['id_categoria'],$_POST['Nombre'], $_POST['Descripción'], $_POST['Precio'], $_POST['Estado'], $_POST['Imagen']);
    $controler_producto->agregar($Producto);
}

=======
    $Producto = new Producto();

    $Producto->setIdCategoria($id_categoria);
    $Producto->setNombre($Nombre);
    $Producto->setDescripcion($Descripcion);
    $Producto->setPrecio($Precio);
    $Producto->setEstado($Estado);
    $Producto->setImagen($Imagen);

    $controladorProductos->insertar($Producto);
}
>>>>>>> d80f3d0db938ee0131384d538f096b162bbf300a

?>


<section class="py-5 bg-light mt-5 mb-0">


<div class="container mt-5">
        <!-- Botón para abrir el modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
            Agregar Producto
        </button>
    </div>

    <!-- Modal -->
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
                            <label for="productPrice" class="form-label">categoria</label>
<<<<<<< HEAD
                            <input type="number" class="form-control" name="id_categoria" id="id_categoria" required>
=======
                            <input type="number" class="form-control" name="idcategoria" id="productPrice" required>
>>>>>>> d80f3d0db938ee0131384d538f096b162bbf300a
                        </div>
                    
                    
                    <div class="mb-3">
                            <label for="productName" class="form-label">Nombre del Producto</label>
<<<<<<< HEAD
                            <input type="text" class="form-control" name="Nombre" id="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" name="Descripción" id="Descripción" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="Precio" id="Precio" required>
=======
                            <input type="text" class="form-control" name="nombre" id="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="productDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="precio" id="productPrice" required>
>>>>>>> d80f3d0db938ee0131384d538f096b162bbf300a
                        </div>

                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Estado</label>
<<<<<<< HEAD
                            <input type="number" class="form-control" name="Estado" id="Estado" required>
                        </div>

                        <div class="mb-3">
                            <label for="productImage" class="form-label">URL de la Imagen</label>
                            <input type="file" class="form-control" name="Imagen" id="Imagen" accept="image/jpeg/png">
=======
                            <input type="number" class="form-control" name="estado" id="productPrice" required>
                        </div>

                        <div class="mb-3">
                        <label for="productImage" class="form-label">URL de la Imagen</label>
                        <input type="text" class="form-control" name="imagen" id="productImage" placeholder="Ingrese la URL de la imagen">
>>>>>>> d80f3d0db938ee0131384d538f096b162bbf300a
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
    <?php foreach ($controler_producto->listar() as $producto): ?>
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->

            <img class="card-img-top" src="<?php echo htmlspecialchars($producto['Imagen']); ?>" alt="Imagen de <?php echo htmlspecialchars($producto['Nombre']); ?>" />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder"><?php echo htmlspecialchars($producto['Nombre']); ?></h5>
                    <!-- Product price-->
                    $<?php echo number_format($producto['Precio'], 2); ?>
                </div>
            </div>
            <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
            Mostrar Información del Producto
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Información del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nombre del Producto:</strong><?php print htmlspecialchars($producto['Nombre']);?></p>
                    <p><strong>Descripción:</strong> <?php print htmlspecialchars($producto['Descripción']);?></p>
                    <p><strong>Precio:</strong> $<?php print htmlspecialchars($producto['Precio']);?></p>
                    
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
</div>
</section>