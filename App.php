<?php
include "TresEnRaya.php";

const TIC_TAC_TOE = 3; //TIC TAC TOE siempre es de 3
const TOKEN_X = "X";
const TOKEN_O = "O";

const DIMENSION = TIC_TAC_TOE; //Para 3 poner TIC_TAC_TOE, para otras dimensiones poner el número

function token() {
        return (rand(0,1) == 0) ? TOKEN_X : TOKEN_O;
}


function tirada () {
        $matriz = [];
        for($j = 0; $j < DIMENSION; $j ++) {     
                for($i = 0; $i < DIMENSION; $i ++) {
                        $matriz [$j][$i] = token();
                }
        }
        return $matriz;
}



$tirada1 = tirada();
$jugada1 = new TresEnRaya($tirada1, DIMENSION, TOKEN_X, TOKEN_O);
echo PHP_EOL . $jugada1->evaluarPartida() . PHP_EOL . PHP_EOL;






