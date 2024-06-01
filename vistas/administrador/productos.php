<?php
$controladorProductos = new ProductosController();
$productos = $controladorProductos->listar();

?>
<section class="py-5 bg-light mt-5 mb-0">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">PRODUCTOS</h2>
           


<div class="row row-cols-1 row-cols-md-4 g-3">
    <?php foreach ($productos as $producto): ?>
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
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="">INFORMACION</a></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

</div>
</div>
</section>