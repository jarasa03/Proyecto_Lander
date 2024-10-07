<?php

class Puntuacion
{

    private $id_puntuacion;
    private $id_Usuario;
    private $id_simulacion;
    private $tiempo;
    private $fuel;
    private $fecha;

    public function __construct($id_puntuacion, $id_Usuario, $id_simulacion, $tiempo, $fuel, $fecha)
    {
        $this->id_puntuacion = $id_puntuacion;
        $this->id_Usuario = $id_Usuario;
        $this->id_simulacion = $id_simulacion;
        $this->tiempo = $tiempo;
        $this->fuel = $fuel;
        $this->fecha = $fecha;
    }

    public function getId_Usuario()
    {
        return $this->id_Usuario;
    }

    public function setId_Usuario($id_Usuario)
    {
        $this->id_Usuario = $id_Usuario;
    }

    public function getTiempo()
    {
        return $this->tiempo;
    }

    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;
    }

    public function getFuel()
    {
        return $this->fuel;
    }

    public function setFuel($fuel)
    {
        $this->fuel = $fuel;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getId_Puntuacion()
    {
        return $this->id_puntuacion;
    }
    public function setId_Puntuacion($id_puntuacion)
    {
        $this->id_Puntuacion = $id_puntuacion;
    }
    public function getIdSimulacion()
    {
        return $this->id_simulacion;
    }
    public function setId_Simulacion($id_simulacion)
    {
        $this->id_simulacion = $id_simulacion;
    }

}
