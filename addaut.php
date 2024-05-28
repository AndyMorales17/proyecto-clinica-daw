<?php 

require_once("cn.php");
if(isset($_POST['ok1'])){
    $nombres=$_POST["nombres"];
    $apellidos=$_POST["apellidos"];
    $alias_de_autor=$_POST["alias_de_autor"];
    $sql="INSERT INTO autor (nombres, apellidos, alias_de_autor)VALUES('$nombres', '$apellidos', '$alias_de_autor')";
    $rs=$cn->query($sql);
}
?>

<div class="container mt-5">


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
                >Autores</label
            >
            <div
                class="col-8"
            >
                <input
                    type="text"
                    class="form-control"
                    name="nombres"
                    id="inputName"
                    placeholder="ingrese el nombre del autor"
                />
                <input
                    type="text"
                    class="form-control"
                    name="apellidos"
                    id="inputName"
                    placeholder="ingrese el apellido del autor"
                />
                <input
                    type="text"
                    class="form-control"
                    name="alias_de_autor"
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