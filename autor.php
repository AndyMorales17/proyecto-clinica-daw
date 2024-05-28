

<?php 

require_once("cn.php");

//borrar
if(isset($_POST['del'])){
	if(isset($_POST['eliminar'])){
        $id = $_POST["eliminar"];
        foreach($id as $idcat){
            $sql= "DELETE FROM autor WHERE id_autor=$idcat";
            $rs=$cn->query($sql);
        }
    }else{
        echo "Seleccione un elemento";
    }
    

   
	//$sql="DELETE FROM usuarios WHERE id='".$id."'";

}


//consulta
$sql="SELECT * FROM autor";
$rs=$cn->query($sql);





?>

<div class="container mt-5">

<div
    class="table-responsive"
>
<div
    class="alert alert-primary"
    role="alert"
>
    <strong>Administrar categorías</strong>  <a class='btn btn-success' href='addaut'>Agregar Autor</a>
</div>
<form method=post >
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Alias</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>

        <?php 
           while ($fila=$rs->fetch_assoc()) {
                echo "
                <tr  >
                    <td  > <input type='checkbox'  name='eliminar[]' value='$fila[id_autor]' title='$fila[id_autor]' > </td>
                    <td>$fila[id_autor]</td>
                    <td>$fila[nombres]</td>
                    <td>$fila[apellidos]</td>
                    <td>$fila[alias_de_autor]</td>
                    <td><a href='update/$fila[id_autor]'>autor </a></td>
                </tr>
                ";

           } 
            
            ?>

            
            <tr>
                <td colspan=4>
                    
                    <input class='btn btn-danger' type="submit" value="Eliminar" name=del >
                    
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>


</div>