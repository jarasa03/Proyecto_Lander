<?php

class Player {

    private $id = 0;
    private $nombre;
    private $pwd;
    private $grupo;
    private $fechaLogin;

    
    public function __construct($nombre, $pwd, $grupo) {
        
            $this->nombre = $nombre;
            $this->pwd = $pwd;
            $this->grupo = $grupo;
       
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function getGrupo() {
        return $this->grupo;
    }

    public function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

    public function getFechaLogin() {
        return $this->fechaLogin;
    }

    public function setFechaLogin($fechaLogin) {
        $this->fechaLogin = $fechaLogin;
    }

    public function __toString() {
        return $this->nombre . "  ( " . $this->grupo . " )";
    }
}
