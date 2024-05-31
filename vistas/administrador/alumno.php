<?php 
    $alumnos_controller = new alumno_controler();

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h1 class="fw-bold">Todos los Alumnos</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Carnet</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            <th>Foto</th>
                            <th>Estado</th>
                            <th>Año Ingreso</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       foreach($alumnos_controller->listar() as $item){
                        echo "<tr>";
                        echo "<td> {$item['idalumno']} </td>";
                        echo "<td> {$item['carnet']} </td>";
                        echo "<td> {$item['nombre']} </td>";
                        echo "<td> {$item['sexo']} </td>";
                        echo "<td><img src='uploads/{$item['foto']}' alt='Foto' width='50' height='50'></td>";
                        echo "<td> {$item['estadoAlumno']} </td>";
                        echo "<td> {$item['yearingreso']} </td>";
                        echo "</tr>";
                       }
                       ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
            
        </div>
        
            </div>
        </div>
    </div>
</div>
