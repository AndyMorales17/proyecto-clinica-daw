<?php

class Categoria {

    private $id_categoria;
    private $nombre;
    private $descripcion;

    public function __construct($id_cat = "", $nom = "", $des = "") {
        $this->id_categoria = $id_cat;
        $this->nombre = $nom;
        $this->descripcion = $des;
    }

    // Getters
    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Setters
    public function setIdCategoria($id_cat) {
        $this->id_categoria = $id_cat;
    }

    public function setNombre($nom) {
        $this->nombre = $nom;
    }

    public function setDescripcion($des) {
        $this->descripcion = $des;
    }
}

?>
