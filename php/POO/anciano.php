<?php

    include_once("pacientes.php");

    class Anciano extends Pacientes {
        private $dieta;

        public function anciano($nombre, $edad, $noHistoriaClinica, $dieta)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->noHistoriaClinica = $noHistoriaClinica;
            $this->dieta = $dieta;
            
        }

        public function getDieta(){
            echo "Dieta: ". $this->dieta;
        }

        public function setPrioridad($dieta, $edad){
            if($dieta == "1"){
                if($edad >= 60 && $edad <= 100){
                    $prioridad = ($edad/20) + 4;
                }
            }else{
                $prioridad = ($edad/30) + 3;
            }

            return $prioridad;

        }



    }
?>