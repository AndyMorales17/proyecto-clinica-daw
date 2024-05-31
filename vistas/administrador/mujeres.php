<?php 
    $alumnos_controller = new alumno_controler();

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h1 class="fw-bold">Lista de Alumnas</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Sexo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       foreach($alumnos_controller->listarf() as $item){
                        echo "<tr>";
                        echo "<td> {$item['idalumno']} </td>";
                        echo "<td> {$item['nombre']} </td>";
                        echo "<td> {$item['sexo']} </td>";
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
