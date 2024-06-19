<?php

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redireccionando...</title>
</head>
<body>
    
    <script>
        // Redirige automáticamente a la página de login inmediatamente
        setTimeout(function(){
            window.location.href = "index.php";
        }, 0);
    </script>
</body>
</html>
