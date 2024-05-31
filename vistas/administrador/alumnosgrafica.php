<?php 
    $alumnos_controller = new alumno_controler();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de Alumnos por Sexo</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <h1 class="fw-bold">Cantidad de Alumnos por Sexo</h1>
            </div>
            <div class="card-body">
                <canvas id="sexoChart"></canvas>

    
    <div style="width: 50%;">
        <canvas id="chartGeneroAlumnos"></canvas>
    </div>

    <?php
    // Establecer la conexión a la base de datos
    $host = 'localhost';
    $dbname = 'aquino';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consultar la cantidad de alumnos por género
        $sql = "SELECT sexo, COUNT(*) AS count FROM alumnoej GROUP BY sexo";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $alumnos_por_genero = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Preparar los datos para el gráfico
        $labels = [];
        $data = [];
        foreach ($alumnos_por_genero as $row) {
            if ($row['sexo'] === 'M') {
                $labels[] = 'Masculino';
            } elseif ($row['sexo'] === 'F') {
                $labels[] = 'Femenino';
            } else {
                $labels[] = 'No definido';
            }
            $data[] = $row['count'];
        }

        // Convertir los datos a formato JSON para el gráfico
        $data_json = json_encode($data);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

    <script>
        // Obtener los datos desde PHP
        var data = <?php echo $data_json; ?>;
        
        // Configurar el gráfico
        var ctx = document.getElementById('chartGeneroAlumnos').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Cantidad de Alumnos',
                    backgroundColor: ['#F78478', '#41B19B', '#8BA5F9','#41B19B'],
                    data: data
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Cantidad de Alumnos por Género'
                },
                legend: {
                    display: false
                }
            }
        });
    </script>   

</div>
        </div>
    </div>

