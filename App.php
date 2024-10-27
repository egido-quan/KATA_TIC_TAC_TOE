<?php
include "TresEnRaya.php";

function token( $tokenX, $tokenO) {
        return (rand(0,1) == 0) ? $tokenX : $tokenO;
}


function tirada ($dimension, $tokenX, $tokenO) {
        $matriz = [];
        for($j = 0; $j < $dimension; $j ++) {     
                for($i = 0; $i < $dimension; $i ++) {
                        $matriz [$j][$i] = token( $tokenX, $tokenO);
                }
        }
        return $matriz;
}

echo "VAMOS A JUGAR A TIC_TAC_TOE!!" . PHP_EOL;

$dos = false;
while (!$dos) {
        $tokens = readline("Qué símbolos usarás para jugar (introdúce DOS SÍMBOLOS separados por un espacio) ? ");
        $dos = count(explode(' ', $tokens)) == 2;
        }
list($tokenX, $tokenO) = explode(' ', $tokens);
$dimension = -1;
while ($dimension !=0) {
        $dimension = readline("Introduce la dimensión del TIC_TAC_TOE (ej: 3 para 3x3) o cualquier otra tecla para dejar de jugar: ");
        $dimension = (int)$dimension;
        if ($dimension != 0) {
                $tirada = tirada($dimension, $tokenX, $tokenO);
                $jugada = new TresEnRaya($tirada, $dimension, $tokenX, $tokenO);
                echo PHP_EOL . $jugada->evaluarPartida() . PHP_EOL . PHP_EOL;
        }
}

echo PHP_EOL . "Hasta pronto!";




