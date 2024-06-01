<?php


Class Cliente{

    Private $id_cliente;
    Private $Nombre;
    Private $Apellido;
    Private $Email;
    Private $Estado;
    Private $Teléfono;
    Private $Dirección;



    //Constructor

    private function __construct($id_cli="", $Nom="",$ape="",$em="",$Esta="",$Tel="",$Dir=""){

        $this -> $id_cliente = $id_cli;
        $this -> $Nombre = $Nom;
        $this -> $Apellido = $ape;
        $this -> $Email= $em;
        $this -> $Estado = $Esta;
        $this -> $Teléfono = $Tel;
        $this -> $Dirección = $Dir;
    }


    //Gettters

    public function getIdCliente(){
        return $this -> $id_cliente;
    }

    public function getNombre(){
        return $this-> $Nombre;
    }

    public function getApellido(){
        return $this -> $Apellido;
    }

    public function getEmail(){
        return $this -> $Email;
    }

    public function getEstado(){
        return $this -> $Estado;
    }

    public function getTeléfono(){
        return $this -> $Teléfono;
    }

    public function getDirección(){
        return $this -> $Dirección;
    }

    //Setters

    public function setIdCliente($id_cli){
        $this -> $id_cliente = $id_cli;
    }

    public function setNombre($Nom){
        $this -> $Nombre = $Nom;
    }

    public function setApellido($ape){
        $this -> $Apellido = $ape;
    }

    public function setEmail($em){
        $this -> $Email = $em;
    }

    public function setEstado($Esta){
        $this -> $Estado = $Esta;
    }

    public function setTeléfono($Tel){
        $this -> $Teléfono = $Tel;
    }

    public function setDirección($Dir){
        $this -> $Dirección = $Dir;
    }
}
?>