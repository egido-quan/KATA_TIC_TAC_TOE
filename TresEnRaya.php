<?php

class TresEnRaya {

    private $resultado;
    private $dimension;
    private $tokenX, $tokenO;


    public function __construct($resultado, $dimension, $tokenX, $tokenO) {
        $this->resultado = $resultado;
        $this->dimension = $dimension;
        $this->tokenX = $tokenX;
        $this->tokenO = $tokenO;
    }

        private function fila ($token) {
            for ($j = 0; $j < $this->dimension; $j++) {
                $k = 0;
                for ($i = 0; $i < $this->dimension - 1; $i++) {
                    if ($this->resultado[$j][$i] == "$token" && $this->resultado[$j][$i] == $this->resultado[$j][$i+1]) {
                        $k += 1; }
                }
                if ($k == $this->dimension - 1) {
                    return $fila = true;
                }
            }
            return $fila = false;
        }


        private function columna ($token) {
            for ($j = 0; $j < $this->dimension; $j++) {
                $k = 0;
                for ($i = 0; $i < $this->dimension - 1; $i++) {
                    if ($this->resultado[$i][$j] == "$token" && $this->resultado[$i][$j] == $this->resultado[$i+1][$j]) {
                        $k += 1; }
                }
                if ($k == $this->dimension - 1) {
                    return $columna = true;
                }
            }
            return $columna = false;

        }

    private function diagonal ($token) {
            $k = 0;
            for ($j = 0; $j < $this->dimension - 1; $j++) {

                if ($this->resultado[$j][$j] == "$token" && $this->resultado[$j][$j] == $this->resultado[$j+1][$j+1]) {
                        $k += 1; }
                }

                if ($k == $this->dimension - 1) {
                    return $diagonal = true;
                }
            $k = 0;
            for ($j = $this->dimension - 1; $j > 0; $j--) {

                if ($this->resultado[($this->dimension - 1) - $j][$j] == "$token" && $this->resultado[($this->dimension - 1) - $j][$j] == $this->resultado[($this->dimension - 1) - $j + 1][$j - 1]) {
                        $k += 1; }
                }

                if ($k == $this->dimension - 1) {
                    return $diagonal = true;
                }
            return $diagonal = false;
        }


    
    public function evaluarPartida() {
        $this->printTirada();
        $x = ($this->diagonal($this->tokenX) || $this->columna($this->tokenX) || $this->fila($this->tokenX) ) ? true : false;
        $o = ($this->diagonal($this->tokenO) || $this->columna($this->tokenO) || $this->fila($this->tokenO) ) ? true : false;

        return match(true) {
            ($x && $o) || (!$x && !$o)  => "Empate",
            ($x && !$o) => "Ganan las " . $this->tokenX,
            (!$x && $o) => "Ganan las " . $this->tokenO,
        };         

    }

    public function printTirada() {
        foreach($this->resultado as $fila) {
            echo "( ";
            foreach($fila as $token) {
                echo " $token ";
            }
            echo " ) " . PHP_EOL;
        }
    }
}



