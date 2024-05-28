<?php
require_once("cn.php");
$info=explode("/",$_GET["url"]);
if(isset($_POST['ok1'])){
    $nombres=$_POST["nombreS"];
    $apellidos=$_POST["apellidos"];
    $alias_de_autor=$_POST["alias_de_autor"];
    echo $sql=" update autor set nombres='$nombres', apellidos='$apellidos', alias_de_autor='$alias_de_autor' where id_autor='$info[1]' ";
    $rs=$cn->query($sql);
    
}





$sql="SELECT * FROM autor WHERE id_autor=$info[1]";
$rs=$cn->query($sql);
$fila=$rs->fetch_assoc();


?>
<div  class="container mt-5">

<div
    class="alert alert-primary"
    role="alert"
>
    <strong>Agregar nueva categoria</strong> 
</div>
<div class="container">
    <form method=post>
        <div class="mb-3 row">
            <label
                for="inputName"
                class="col-4 col-form-label"
                >Categoría</label
            >
            <div
                class="col-8"
            >
                <input
                    type="text"
                    class="form-control"
                    name="nombres"
                    value="<?php echo  $fila['nombres'] ?>"
                    id="inputName"
                    placeholder="ingrese el nombre del autor"
                />
                <input
                    type="text"
                    class="form-control"
                    name="apellidos"
                    value="<?php echo  $fila['apellidos'] ?>"
                    id="inputName"
                    placeholder="ingrese el apellido del autor"
                />
                <input
                    type="text"
                    class="form-control"
                    name="alias_de_autor"
                    value="<?php echo  $fila['alias_de_autor'] ?>"
                    id="inputName"
                    placeholder="ingrese el alias del autor"
                />
            </div>
        </div>
        
        <div class="mb-3 row">
            <div class="offset-sm-4 col-sm-8">
                <button type="submit" name=ok1 class="btn btn-primary">
                    Agregar
                </button>
            </div>
        </div>
    </form>
</div>

</div>