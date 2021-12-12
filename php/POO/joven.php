<?php 
    include_once ("pacientes.php");

    class Joven extends Pacientes {

        private $fumador;
        private $anhos;

        public function nino($nombre, $edad, $noHistoriaClinica, $fumador, $anhos)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->noHistoriaClinica = $noHistoriaClinica;
            $this->fumador = $fumador;
            $this->anhos = $anhos;
        }

        public function setPrioridad ($fumador, $anhos) {
            //echo $fumador;
            if($fumador == "1"){
                $prioridad = ($anhos/4) + 2;
                //echo "Entro a fumador";
            } else {
                $prioridad = 2;
                //echo "Entro a no fumador";
            }

            return $prioridad;

        }

    }
?>