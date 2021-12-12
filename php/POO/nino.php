<?php 
    include_once ("pacientes.php");

    class Nino extends Pacientes {

        private $pesoEstatura;

        public function nino($nombre, $edad, $nroHistoriaClinica, $pesoEstatura)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->nroHistoriaClinica = $nroHistoriaClinica;
            $this->pesoEstatura = $pesoEstatura;
        }

        public function setPrioridad($edad, $pesoEstatura) {
            if($edad >= 1 && $edad <= 5){
                //echo "Entro a 1 a 5";
                $prioridad = $pesoEstatura + 3;
                
            }

            if($edad >= 6 && $edad <= 12){
                //echo "Entro a 6 a 12";
                $prioridad = $pesoEstatura + 2;
                
            }

            if($edad >= 13 && $edad <= 15){
                //echo "Entro a 13 a 15";
                $prioridad = $pesoEstatura + 1;
                
            }

            return $prioridad;

        }
    }
?>