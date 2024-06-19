<?php
// Inicializar el controlador de productos
//session_destroy();
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}


$ControllerStock = new ControllerStock();
$controler_producto = new ProductosController();
$productos = $controler_producto->todos();

$total = 0;
$productos_carrito = [];
if (isset($_POST['comprar'])) {

   // Obtener el id_usuario desde la sesión (asegúrate de tener iniciada la sesión antes)
   $id_usuario = $_SESSION['id'];
    
   // Obtener la fecha actual en formato 'Y-m-d'
   $fecha_compra = date('Y-m-d');
   
   // Crear una instancia de la clase Conexion
   $conexion = new conexion();
   
   // Iterar sobre las cantidades de productos enviados en el formulario
   foreach ($_POST['cantidad'] as $id_producto => $cantidad) {
       // Escapar variables para prevenir inyección SQL (o usar sentencias preparadas)
       $id_producto = $conexion->cn()->real_escape_string($id_producto);
       $cantidad = $conexion->cn()->real_escape_string($cantidad);
       
       $ControllerStock->stock($id_producto,$cantidad);
       // Preparar la consulta SQL utilizando la instancia de la clase Conexion
       $sql = "INSERT INTO Compras (id_usuario, id_producto, Fecha, Cantidad) 
               VALUES ('$id_usuario', '$id_producto', '$fecha_compra', '$cantidad')
               ";
       
       // Ejecutar la consulta SQL utilizando el método ejecutarSQL de la instancia de Conexion
       $rs = $conexion->ejecutarSQL($sql);
       
       
    
       unset($_SESSION['carrito']);
       
       if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
   }

     
}
// Verificar si se ha enviado una solicitud para actualizar o quitar productos del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['actualizar_carrito'])) {
        foreach ($_POST['cantidad'] as $id => $cantidad) {
            $_SESSION['carrito'][$id] = $cantidad;
        }
    } elseif (isset($_POST['eliminar_producto'])) {
        $id_producto = $_POST['eliminar_producto'];
        unset($_SESSION['carrito'][$id_producto]);
    
        // Recalcular el total y obtener los productos actualizados en el carrito
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            foreach ($productos as $producto) {
                if ($producto['id_producto'] == $id) {
                    $total += $producto['Precio'] * $cantidad;
                    $productos_carrito[] = [
                        'id_producto' => $producto['id_producto'],
                        'Nombre' => $producto['Nombre'],
                        'Precio' => $producto['Precio'],
                        'Cantidad' => $cantidad,
                        'Subtotal' => $producto['Precio'] * $cantidad
                    ];
                }
            }
        }
    
        // Enviar una respuesta JSON con los productos actualizados y el total
        header('Content-Type: application/json');
        echo json_encode(['total' => number_format($total, 2), 'productos' => $productos_carrito]);
        exit; // Terminar la ejecución aquí después de enviar la respuesta JSON
    }
    
}
     


// Recalcular el total (en caso de que no se haya eliminado ningún producto)
foreach ($_SESSION['carrito'] as $id => $cantidad) {
    foreach ($productos as $producto) {
        if ($producto['id_producto'] == $id) {
            $total += $producto['Precio'] * $cantidad;
        }
    }
}
?>

<section class="py-5 bg-light mt-5 mb-0">
    <div class="container px-4 px-lg-5 mt-5">
        <h1>Carrito de Compras</h1>
        <div id="carrito-lista">
            <form id="carrito-form" method="post">
                <table id="carrito-table" class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php foreach ($_SESSION['carrito'] as $id => $cantidad) : ?>
        <?php foreach ($productos as $producto): ?>
            <?php if ($producto['id_producto'] == $id) : ?>
                <tr>
                    <td>
                        <?php echo htmlspecialchars($producto['Nombre']); ?>
                        <input type="hidden" name="producto_id[]" value="<?php echo $producto['id_producto']; ?>">
                    </td>
                    <td>
                        <input type="number" name="cantidad[<?php echo $producto['id_producto']; ?>]" class="form-control cantidad" value="<?php echo $cantidad; ?>" min="1" onchange="actualizarCarrito()">
                    </td>
                    <td>$<?php echo number_format($producto['Precio'], 2); ?></td>
                    <td>$<span class="subtotal"><?php echo number_format($producto['Precio'] * $cantidad, 2); ?></span></td>
                    <td>
                        <button type="submit" class="btn btn-danger eliminar-producto" data-producto-id="<?php echo $producto['id_producto']; ?>">Eliminar</button>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</tbody>

                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right"><strong>Total:</strong></td>
                            <td>$<span id="total-carrito"><?php echo number_format($total, 2); ?></span></td>
                        </tr>
                    </tfoot>
                </table>
                <button type="submit" name="actualizar_carrito" class="btn btn-primary">Actualizar Carrito</button>
                <button type="submit" name="comprar" class="btn btn-primary">Realiza compra</button>
                <a href="todos2" class="btn btn-primary">Continuar comprando</a>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnEliminar = document.querySelectorAll('.eliminar-producto');

        btnEliminar.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var productoId = this.getAttribute('data-producto-id');
                eliminarProducto(productoId);
            });
        });

        function eliminarProducto(idProducto) {
    var formData = new FormData();
    formData.append('eliminar_producto', idProducto);

    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        if (response.ok) {
            return response.json(); // Parsear la respuesta JSON
        } else {
            throw new Error('Error al eliminar producto del carrito');
        }
    })
    .then(function(data) {
        // Actualizar la tabla del carrito con los productos restantes y el nuevo total
        actualizarTablaCarrito(data);
        // Recargar la página después de un breve retraso (opcional)
        setTimeout(function() {
            location.reload();
        }, 1000); // Recargar la página después de 1 segundo (1000 milisegundos)
    })
    .catch(function(error) {
        console.error('Error en la solicitud fetch:', error);
    });
}


        function actualizarTablaCarrito(data) {
            var tbody = document.querySelector('#carrito-table tbody');
            var totalElement = document.getElementById('total-carrito');

            // Limpiar la tabla actual
            tbody.innerHTML = '';

            // Reconstruir la tabla con los productos actualizados
            data.productos.forEach(function(producto) {
                var row = '<tr>' +
                    '<td>' + htmlspecialchars(producto.Nombre) + '<input type="hidden" name="producto_id[]" value="' + producto.id_producto + '"></td>' +
                    '<td><input type="number" name="cantidad[' + producto.id_producto + ']" class="form-control cantidad" value="' + producto.Cantidad + '" min="1" onchange="actualizarCarrito()"></td>' +
                    '<td>$' + parseFloat(producto.Precio).toFixed(2) + '</td>' +
                    '<td>$<span class="subtotal">' + parseFloat(producto.Subtotal).toFixed(2) + '</span></td>' +
                    '<td><button type="button" class="btn btn-danger eliminar-producto" data-producto-id="' + producto.id_producto + '">Eliminar</button></td>' +
                    '</tr>';
                tbody.insertAdjacentHTML('beforeend', row);
            });

            // Actualizar el total
            totalElement.textContent = '$' + data.total;
        }

        function actualizarCarrito() {
            var listaProductos = document.querySelectorAll('#carrito-lista tbody tr');
            var total = 0;

            listaProductos.forEach(function(producto) {
                var cantidad = parseInt(producto.querySelector('.cantidad').value);
                var precioUnitario = parseFloat(producto.querySelector('.subtotal').textContent.replace('$', '')) / cantidad;
                var subtotal = cantidad * precioUnitario;
                producto.querySelector('.subtotal').textContent = subtotal.toFixed(2);
                total += subtotal;
            });

            document.getElementById('total-carrito').textContent = total.toFixed(2);
        }
    });
</script>



