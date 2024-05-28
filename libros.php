<?php 

require_once("cn.php");

//borrar
if(isset($_POST['del'])){
	if(isset($_POST['eliminar'])){
        $id = $_POST["eliminar"];
        foreach($id as $idcat){
            $sql= "DELETE FROM libros WHERE idlibro=$idcat";
            $rs=$cn->query($sql);
        }
    }else{
        echo "Seleccione un elemento";
    }
    

   
	//$sql="DELETE FROM usuarios WHERE id='".$id."'";

}


//consulta
$sql="SELECT * FROM libros";
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
    <strong>Administrar categorías</strong>  <a class='btn btn-success' href='addlib'>Agregar Libros</a>
</div>
<form method=post >
    <table
        class="table table-primary"
    >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">isbn</th>
                <th scope="col">nombre_libro</th>
                <th scope="col">year_publicacion</th>
                <th scope="col">volumen</th>
                <th scope="col">categoria</th>
                <th scope="col">foto</th>
                <th scope="col">id_autor</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>

        <?php 
           while ($fila=$rs->fetch_assoc()) {
                echo "
                <tr  >
                    <td  > <input type='checkbox'  name='eliminar[]' value='$fila[idlibro]' title='$fila[idlibro]' > </td>
                    <td>$fila[idlibro]</td>
                    <td>$fila[isbn]</td>
                    <td>$fila[nombre_libro]</td>
                    <td>$fila[year_publicacion]</td>
                    <td>$fila[volumen]</td>
                    <td>$fila[categoria]</td>
                    <td><img src= '$fila[foto]'></td>
                    <td>$fila[id_autor]</td>
                    <td><a href='updatelib/$fila[idlibro]'>A </a></td>
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