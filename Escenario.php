<?php

class Escenario
{

// Zona de declaración de variables
    private $id = 0; // 0 para enteros // PK en BDD
    private $nombre = ""; // la inicializo a nada para que sea tipo string // nombre del planeta o satelite
    private $g = 0.0; // 0.0 para tipo double // Gravedad
    private $ve = 0.0; // velocidad de entrada
    private $he = 0.0; // distancia de aproximacion

    // Constructor
    public function __construct($id, $nombre, $g, $ve, $he)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->g = $g;
        $this->ve = $ve;
        $this->he = $he;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nombre;
    }
    public function getG()
    {
        return $this->g;
    }
    public function getVe()
    {
        return $this->ve;
    }
    public function getHe()
    {
        return $this->he;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setG($g){
        $this->g = $g;
    }
    public function setVe($ve){
        $this->ve = $ve;
    }
    public function setHe($he){
        $this->he = $he;
    }

    // Método toString
    public function __toString() {
        return $this->nombre . "  (G)  " . $this->g . "  (Ve)  " . $this->ve . "  (He)  " . $this->he;
    }
}
