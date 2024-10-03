<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lander</title>
</head>
<body>
    <?php

    class Lander{

/* Variables */

private $id = 0;
private $nombre;
private $impulso;
private $nivel_impulso;
private $fuel_a_quemar;
private $fuel_deposito;
private $tiempo;
private $res_tren;
private $perfPot;

/* Constructor */
public function __construct($nombre,$fuel_deposito,$res_tren){
    $this ->nombre = $nombre;
    $this ->fuel_deposito = $fuel_deposito;
    $this ->res_tren = $res_tren;
    $this ->perfPot = null;
}
/* Getters y setters */

public function getNombre(){
    return $this ->nombre;
}
public function setNombre($nombre){
    $this ->nombre = $nombre;
}

public function getImpulso(){
    return $this ->impulso;
}
public function setImpulso($impulso){
    $this ->impulso = $impulso;
}
public function getNivel_impulso(){
    return $this ->nivel_impulso;
}
public function setNivel_impulso($nivel_impulso){
    $this ->nivel_impulso = $nivel_impulso;
}
public function getFuel_a_quemar(){
    return $this ->fuel_a_quemar; 
}
public function setFuel_a_quemar($fuel_a_quemar){
    $this ->fuel_a_quemar = $fuel_a_quemar;
}
public function getFuel_deposito(){
    return $this -> fuel_deposito;
}
public function setFuel_deposito($fuel_deposito){
    $this -> fuel_deposito = $fuel_deposito;
}
public function getTiempo(){
    return $this -> tiempo;
}
public function setTiempo($tiempo){
    $this ->tiempo = $tiempo;
}
public function getPerfbot($nivel){
    return $this -> perfPot[$nivel];
}
public function setPerfbot($p){
    $this ->perfPot = $p;
}
public function getId(){
    return $this -> id;
}
public function setId($id){
    $this -> id = $id;
}
public function getres_tren(){
    return $this -> res_tren;
}
public function __tostring(){
    return $this-> nombre . " (fuel) " . $this-> fuel_deposito . " (Tren AT ) " . $this -> res_tren;
}
    }
    ?>

</body>
</html>