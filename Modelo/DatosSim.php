<?php

class DatosSIM
{
    // Zona de declaración de variables
    private $dist = 0.0; // 0.0 Para valores double
    private $acel = 0.0;
    private $vel = 0.0;
    private $impulso = 0.0;
    private $fuel = 0.0;
    private $tiempo = 0; // 0 para el entero

    // Constructor
    public function __construct($dist, $acel, $vel, $impulso, $fuel, $tiempo)
    {
        $this->dist = $dist;
        $this->acel = $acel;
        $this->vel = $vel;
        $this->impulso = $impulso;
        $this->fuel = $fuel;
        $this->tiempo = $tiempo;
    }

    // Getters & Setters
    public function get_dist()
    {
        return $this->dist;
    }
    public function get_acel()
    {
        return $this->acel;
    }
    public function get_vel()
    {
        return $this->vel;
    }
    public function get_impulso()
    {
        return $this->impulso;
    }
    public function get_fuel()
    {
        return $this->fuel;
    }
    public function get_tiempo()
    {
        return $this->tiempo;
    }
    public function set_dist($dist)
    {
        $this->dist = $dist;
    }
    public function set_acel($acel)
    {
        $this->acel = $acel;
    }
    public function set_vel($vel)
    {
        $this->vel = $vel;
    }
    public function set_impulso($impulso)
    {
        $this->impulso = $impulso;
    }
    public function set_fuel($fuel)
    {
        $this->fuel = $fuel;
    }
    public function set_tiempo($tiempo)
    {
        $this->tiempo = $tiempo;
    }

    public function __tostring()
    {
        return "";
    }

}
