<?php
class Simulacion{
    private $id=0; //PK en base de datos
    private $timestamp; // Feccha de simulación
    private $se; // Motor de simulaciónque se utiliza
    private $lander; //Modulo que se utiliza
    private $user; //Jugador que la afecta
    private $planet; // Escenario de la simulación
    private $simData = array(); //Datos de la simulación
    private static $outOfFuel=false; 
    private $__break = false; // Flag para terminar la simulación (el usuario abandona)
    // Para abandonar hay que introducir un nivel de impulso = -1

    // Constructor
    public function __Simulacion($_user,$lander,$planet){
        $this->user=$_user;
        $this->lander=$lander;
        $this->planet=$planet;
        $this->timestamp=new DateTime();
    }
    public function getTimeStamp(){
        return $this->timestamp;
    }
    public function setTimeStamp($timestamp){
        $this->timestamp=$timestamp;
    }
    public function getSe(){
        return $this->se;
    }
    public function setSe($se){
        $this->se=$se;
    }
    public function getLander(){
        return $this->lander;
    }
    public function setLander($lander){
        $this->lander=$lander;
    }
    public function getUser(){
        return $this->user;
    }
    public function setUser($user){
        $this->user=$user;
    }
    public function getPlanet(){
        return $this->planet;
    }
    public function setPlanet($planet){
        $this->planet=$planet;
    }
    public function setSimData(array $simData){
        $this->simData=$simData;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function addSimData(){
        $ds = $this->se->getSimData();
        $ds->setFuel($this->getLander()->getFuel());
        $this->simData[]=$ds;
    }
    public function init():void{
        $this->se = new SimEngine($this->planet->getHe(), $this->planet->getVe(), $this->planet->get_G());
    }
    public function muestraPanel(){
        $vel = $this->se->getVel();
        $dist = $this->se->get_dist();
        $tiempo = $this->se->getTiempo();
        $fuel_deposito = $this->lander->get_fuel_deposito();

        $numbeR = 123.456;
        $formattNumber = sprintf("%+07.2f", $numbeR);
        echo $formattNumber."\n";

        $number = -123.456;
        $formattNumber = sprintf("%+07.2f", $number);
        echo $formattNumber."\n";

        if ($tiempo==0) {
            echo "TIEMPO  DISTANCIA   VEL        FUEL      NIVEL IMPULSO"."\n";
            echo "-------------------------------------------------------"."\n";
        }

        $formattedDist = sprintf("%+07.2f", $dist);
        $formattedVel = sprintf("%+07.2f", $vel);

        printf("%03d %s %s %04d", $tiempo, $formattedDist, $formattedVel, intval($fuel_deposito));
    }
    public function aplicaMotor($l){

        $impulso = 0.0;
        $nivel_impuldo = 0;

        // Sólo si tenemos fuel para quemar
        if (!Simulacion::$outOfFuel) {
            $input = trim(fgets(STDIN));
            printf("?(0-9)"); //Solicita nivel de impulso
            $nivel_impulso = $input; // Lectura de teclado
            if ($nivel_impulso == -1) {
                $nivel_impulso = 0;
                $__break = true;      // Abandonar la simulación
            }
            if ($nivel_impulso < 0) $nivel_impulso = 0; // Sencilla comprobación de límites
            
            if ($nivel_impulso > 0) $nivel_impulso = 9;
        }
        else{
            printf("SIN FUEL , CAIDA LIBRE!");
            sleep(1);
        }

        if ($this->lander->getFuel_deposito() == 0) $nivel_impulso = 0; // Si no queda fuel, no  tiene efecto la eleccón
        $impulso = $this->lander->getPerfPot($nivel_impulso);            // Elijo, en función del nivel el impulso instantaneo
        $this->se->set_impulso($impulso);                                // Pasar el impulso al motot de simulación
        //Consumo de combustible
        $this->lander->setFuel_a_quemar($impulso * 2);                   // No es una simulación realista
        $this->lander->setFuel_deposito($this->lander->getFuel_deposito() - $this->lander->getFuel_a_quemar()); // Actualizo la reserva de fuel

        if ($this->lander->getFuel_deposito() < 0){                      // Eliminar inconsistencias en el cálculo
            $this->lander->setFuel_deposito(0);
            $outOfFuel = true;
        } // Sin fuel
    }

    public function show_result(){
        $flag = false;         // Terminación sin salvar puntación
        $vel_fin = $this->se->getVel();
        $dist_fin = $this->se->get_dist();
        $tiempo = $this->se->get_tiempo();
        $fuel_deposito = $this->lander->getFuel_deposito();
        
        $formattedVel_fin = sprintf("%+07.2f", $vel_fin);
        $formattedDist_fin = sprintf("%+07.2f", $dist_fin);

        echo "Tiempo: $tiempo\n";
        echo "Velocidad final: $formattedVel_fin\n";
        echo "Distancia final: $formattedDist_fin\n";
        echo "Fuel en depósito: " . intval($fuel_deposito) . "\n";
        
        if ($flag === false) {
            echo "Terminación sin salvar la puntuación";
        }

        if (!$this->__break) {
            $flag = (abs($this->se->getVel()>$this->lander->getRes_tren()));
            if ($flag) {
                echo "HAS ESTRELLADO LA NAVE\n";
                echo "------------------------------------------------\n";
                echo "VELOCIDAD DE ENTRADA    : " . sprintf("%+07.2", $vel_fin) . "m/s\n";
                echo "HAS HECHO UN CRATER DE  : ". sprintf("%+07.2", abs($dist_fin)) . " m\n";
                echo "------------------------------------------------\n";
                $flag = false; // no slavar
            }
            else{
                echo "\nATERRIZAJE EXITOSO!!\n";
                echo "------------------------------------------------\n";
                echo "TIEMPO DE SIMULACIÓN : " . $tiempo . " s\n";
                echo "FUEL EN DEPOSITO     : " . $fuel_deposito . " l\n";
                echo "DISTANCIA A OBJETIVO : " . $dist_fin . " m\n";
                echo "------------------------------------------------";
                $flag = false; // no salvar
            } // Misión finalizaada o interrumpida
            return $flag;
        } // show_result

        /**
         * Salvar los datos de simulación en base de datos
         * @return
         */
    }
    public function saveSim($Modo){
            $ds = new DAOSimulacion($Modo);

            try{
                if ($ds->saveSimulacion($this)) {
                    echo "Datos Almacenados en base de datos.\n";
                }
                $ds->_c=null;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            return true;
    }
    /**
     * Registra el marcador obtenido en la base de datos
     * Es llamado de forma interna por saveSim()
     * @return 
     */

     private function saveScore(){
        return true;
     }
     public function show(){
        //Salida por pantalla
     }
}
?>