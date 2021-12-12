<?php 

    class Pacientes {
        //Atributos
        public $nombre;
        public $edad;
        public $noHistoriaClinica;

        //Constructor
        public function __construct($nombre, $edad, $noHistoriaClinica){
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->noHistoriaClinica = $noHistoriaClinica;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            echo "El nombres es: ". $this->nombre ."\n";
        }

        public function setEdad($edad){
            $this->edad = $edad;
        }

        public function getEdad(){
            echo "La edad es: ". $this->edad;
        }

        public function setnoHistoriaClinica($noHistoriaClinica){
            $this->noHistoriaClinica = $noHistoriaClinica;
        }

        public function getnoHistoriaClinica(){
            echo "El noHistoriaClinica es: ". $this->noHistoriaClinica;
        }
            
    }
?>