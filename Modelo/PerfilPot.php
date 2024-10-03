<?php
class PerfilPot{
/*  Variables */

private $id;
public $potencia = [10];

/* Constructor */
public function __construct(){}
/* Getters y setters */
public function getId(){
    return $this ->id;
}
public function setId($id){
    $this ->id = $id;
}
public function getPotencia(){
    return $this ->potencia;
}
public function setPotencia($potencia){
    $this ->potencia = $potencia;
}
}
?>