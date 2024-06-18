<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$controler_producto = new ProductosController();
$productos = $controler_producto->todos();

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Asegúrate de ajustar el path -->
</head>
<body>
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Carrito de Compras</h1>
        <ul class="list-group">
            <?php foreach ($_SESSION['carrito'] as $id => $cantidad) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo htmlspecialchars($productos[$id]['Nombre']); ?>
                    <span class="badge bg-primary rounded-pill"><?php echo $cantidad; ?></span>
                    <span>$<?php echo number_format($productos[$id]['Precio'] * $cantidad, 2); ?></span>
                </li>
                <?php $total += $productos[$id]['Precio'] * $cantidad; ?>
            <?php endforeach; ?>
        </ul>
        <p class="mt-3">Total: $<?php echo number_format($total, 2); ?></p>
        <a href="productos.php" class="btn btn-primary">Continuar comprando</a>
        <a href="checkout.php" class="btn btn-success">Proceder al pago</a>
    </div>
</body>
</html>
