<?php

class TresEnRaya {

    private $resultado;


    public function __construct($resultado) {
        $temp = [];
        $i = 0;
        while ($i < 9) {
                for ($j = 0; $j < 3; $j++) {
                        for ($k = 0; $k < 3; $k++) {
                        $temp[$i] = $resultado[$j][$k];
                        $i++;
                        }
                }
        }
        $this->resultado = $temp;
        $this->printTirada();
    }

    private function  fila ($token) {
        if (($this->resultado[0] == "$token" && $this->resultado[0] == $this->resultado[1] && $this->resultado[0] == $this->resultado[2])
            || ($this->resultado[3] == "$token" && $this->resultado[3] == $this->resultado[4] && $this->resultado[3] == $this->resultado[5])
            || ($this->resultado[6] == "$token" && $this->resultado[6] == $this->resultado[7] && $this->resultado[6] == $this->resultado[8])) {
                return true;
            } else {
        return false;
            }
        }

    private function  columna ($token) {
        if (($this->resultado[0] == "$token" && $this->resultado[0] == $this->resultado[3] && $this->resultado[0] == $this->resultado[6])
            || ($this->resultado[1] == "$token" && $this->resultado[1] == $this->resultado[4] && $this->resultado[1] == $this->resultado[7])
            || ($this->resultado[2] == "$token" && $this->resultado[2] == $this->resultado[5] && $this->resultado[2] == $this->resultado[8])) {
                return true;
            } else {
        return false;
            }
        }

    private function  diagonal ($token) {
        if (($this->resultado[0] == "$token" && $this->resultado[0] == $this->resultado[4] && $this->resultado[0] == $this->resultado[8])
            || ($this->resultado[2] == "$token" && $this->resultado[2] == $this->resultado[4] && $this->resultado[2] == $this->resultado[6])) {
                return true;
            } else {
        return false;
            }
        }
    
    public function evaluarPartida() {

        $x = ($this->columna("X") || $this->fila("X") || $this->diagonal("X")) ? true : false;
        $o = ($this->columna("O") || $this->fila("O") || $this->diagonal("O")) ? true : false;

        return match(true) {
            ($x && $o) || (!$x && !$o)  => "Empate",
            ($x && !$o) => "Ganan las X",
            (!$x && $o) => "Ganan las O",
        };         

    }

    public function printTirada() {
        for($i = 0; $i < 3; $i++)
            echo PHP_EOL . "( " . $this->resultado[3*$i] . " , " . $this->resultado[3*$i + 1] . " , " . $this->resultado[3*$i + 2] . " )" . PHP_EOL;



    }
    

    
    



}



