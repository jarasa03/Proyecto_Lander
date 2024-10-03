<?php
class SimEngine{
    public $dist =0.0;
    public $acel=0.0;
    public $vel=0.0;
    public $dist_ant=0.0;
    public $vel_ant= 0.0;
    public $impulso=0.0;
    public $tiempo=0;
    public $G;
    public $dt;
    const DT = 5;
    public function __SimEngine($dist_ant, $vel_ant, $g){
        $this->dist_ant = $dist_ant;
        $this->vel_ant = $vel_ant;
        $this->G = $g;
        $this->dt = self::DT;
    }
    public function get_dist(){
        return $this->dist;
    }
    public function set_dist($dist){
        $this->dist = $dist;
    }
    public function get_acel(){
        return $this->acel;
    }
    public function set_acel($acel){
        $this->acel = $acel;
    }
    public function get_vel(){
        return $this->vel;
    }   
    public function set_vel($vel){
        $this->vel = $vel;
    }
    public function get_dist_ant(){
        return $this->dist_ant;
    }
    public function getVel_ant(){
        return $this->vel_ant;
    }
    public function get_impulso(){
        return $this->impulso;
    }
    public function set_impulso($impulso){
        $this->impulso = $impulso;
    }
    public function get_tiempo(){
        return $this->tiempo;
    }
    public function setTiempo($tiempo){
        $this->tiempo = $tiempo;
    }
    public function get_G(){
        return $this->G;
    }
    public function set_G($g){
        $this->G = $g;
    }
    public function get_dt(){
        return $this->dt;
    }
    public function set_dt($dt){
        $this->dt = $dt;
    }
    public function getSimData():DatosSim{
        return new DatosSim($this->dist,$this->acel,$this->impulso,0.0,$this->tiempo);
    }
    public function sim_frame():void{
        $this->acel = $this->impulso - $this->G;
        $this->vel = $this->vel_ant + ($this->acel * $this->dt);
        $this->dist = $this->dist_ant + ($this->vel * $this->dt);
        $this->tiempo = $this->tiempo + $this->dt;
        $this->vel_ant = $this->vel;
        $this->dist_ant = $this->dist;
    }
}
?>