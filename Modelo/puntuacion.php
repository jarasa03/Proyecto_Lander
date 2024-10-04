<?php

class Puntuacion {

    private $id_Usuario;
    private $tiempo;
    private $fuel;
    private $fecha;

    public function __construct($id_Usuario, $tiempo, $fuel, $fecha) {
        $this->id_Usuario = $id_Usuario;
        $this->tiempo = $tiempo;
        $this->fuel = $fuel;
        $this->fecha = $fecha;
    }

    public function getId_Usuario() {
        return $this->id_Usuario;
    }

    public function setId_Usuario($id_Usuario) {
        $this->id_Usuario = $id_Usuario;
    }

    public function getTiempo() {
        return $this->tiempo;
    }

    public function setTiempo($tiempo) {
        $this->tiempo = $tiempo;
    }

    public function getFuel() {
        return $this->fuel;
    }

    public function setFuel($fuel) {
        $this->fuel = $fuel;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
