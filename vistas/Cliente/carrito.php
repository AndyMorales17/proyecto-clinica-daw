<?php
//session_start(); // Iniciar la sesión si no está iniciada


// Inicializar el controlador de productos
$controler_producto = new ProductosController();
$productos = $controler_producto->todos();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

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
                <?php if (isset($productos[$id])) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($productos[$id]['Nombre']); ?>
                        <span class="badge bg-primary rounded-pill"><?php echo $cantidad; ?></span>
                        <span>$<?php echo number_format($productos[$id]['Precio'] * $cantidad, 2); ?></span>
                    </li>
                    <?php $total += $productos[$id]['Precio'] * $cantidad; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <p class="mt-3">Total: $<?php echo number_format($total, 2); ?></p>
        <a href="todos2" class="btn btn-primary">Continuar comprando</a>
    </div>
</body>
</html>
