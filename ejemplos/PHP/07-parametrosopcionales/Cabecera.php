<?php
    class Cabecera{
        private $titulo;
        private $ubicacion;
        private $colorFuente;
        private $colorFondo;

        public function __construct($title, $location='center', $cfont='#ffffff', $cback='000000'){
            $this->titulo = $title;
            $this->ubicacion = $location;
            $this->colorFuente = $cfont;
            $this->colorFondo = $cback;
        }

        public function graficar(){
            $estilo = 'font-size: 40px; text-align: '. $this->ubicacion;
            $estilo .= '; color: '. $this->colorFuente;
            $estilo .= '; background-color: ' . $this->colorFondo.';';
            echo '<div style= "'.$estilo.'">';
            echo '<h4>'. $this->titulo.'</h4>';
            echo '</div>';
        }
    }

    class Cabecera2{
        private $titulo;
        private $ubicacion;
        private $enlace;

        public function __construct($title, $location, $link){
            $this->titulo = $title;
            $this->ubicacion = $location;
            $this->enlace = $link;
        }

        public function graficar(){
            $estilo = 'font-size: 40px; text-align: '. $this->ubicacion;
            echo '<div style= "'.$estilo.'">';
            echo '<h4>';
            echo '<a href="'. $this->enlace. '">'.$this->titulo . '</a>';
            echo '</h4>';
            echo '</div>';
        }
    }
?>