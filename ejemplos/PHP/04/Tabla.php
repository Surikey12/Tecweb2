<?php
class Tabla{
    private $matriz = array();
    private $numFilas;
    private $numColumna;
    private $estilo;

    public function __construct($rows, $cols, $style){
        $this->numFilas=$rows;
        $this->numColumna=$cols;
        $this->estilo=$style;
    }

    public function cargar($rows, $cols, $val){
        $this->matriz[$rows][$cols]=$val;
    }

    private function inicio_tabla(){
        echo '<table style="'.$this->estilo.'">';
    }

    private function incio_fila(){
        echo '<tr>';
    }

    private function mostrar_dato($rows, $cols){
        echo '<td style="'.$this->estilo.'">'.$this->matriz[$rows][$cols].'</td>';
    }

    private function fin_fila(){
        echo '</tr>';
    }

    private function fin_tabla(){
        echo '</table>';
    }

    public function graficar(){
        $this->inicio_tabla();
        for($i=0; $i<$this->numFilas; $i++){
            $this->incio_fila();
            for($j=0; $j<$this->numColumna; $j++){
                $this->mostrar_dato($i, $j);
        }
        $this->fin_fila();
    }
    $this->fin_tabla();
    }

}
?>