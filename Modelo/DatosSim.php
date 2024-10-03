<?php

class DatosSIM
{
    // Zona de declaración de variables
    private $dist = double(0);
    private $acel = double(0);
    private $vel = double(0);
    private $impulso = double(0);
    private $fuel = double(0);
    private $tiempo = int(0);

    // Constructor
    public function __construct($dist, $acel, $vel, $impulso, $fuel, $tiempo) {
        $this->dist = $dist;
        $this->acel = $acel;
        $this->vel = $vel;
        $this->impulso = $impulso;
        $this->fuel = $fuel;
        $this->tiempo = $tiempo;
    }

    // Getters & Setters
    public function get_dist() {
        return $this->dist;
    }
    public function get_acel() {
        return $this->acel;
    }
    public function get_vel() {
        return $this->vel;
    }
    public function get_impulso() {
        return $this->impulso;
    }
    public function get_fuel() {
        return $this->fuel;
    }
    public function get_tiempo() {
        return $this->tiempo;
    }
    public function set_dist($dist) {
        $this->dist = $dist;
    }
    public function set_acel($acel) {
        $this->acel = $acel;
    }
    public function set_vel($vel) {
        $this->vel = $vel;
    }
    public function set_impulso($impulso) {
        $this->impulso = $impulso;
    }
    public function set_fuel($fuel) {
        $this->fuel = $fuel;
    }
    public function set_tiempo($tiempo) {
    $this->tiempo = $tiempo;
    }

    public function __tostring() {
        return "";
    }

}
