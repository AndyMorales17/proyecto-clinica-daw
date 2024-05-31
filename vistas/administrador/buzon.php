<?php 
    $buzon_controller = new buzon_controler();

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h1 class="fw-bold">Top 10 Fechas de Entregas</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Fecha de Subida</th>
                            <th>Número de Entregas</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                       $buzon_controller = new buzon_controler();
                       foreach($buzon_controller->listar() as $item){
                        echo "<tr>";
                        echo "<td> {$item['fechaup']} </td>";
                        echo "<td> {$item['num_entregas']} </td>";
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
