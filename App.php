<?php
include "TresEnRaya.php";

const TOKEN_X = "X";
const TOKEN_O = "O";

function token() {
        return (rand(0,1) == 0) ? TOKEN_X : TOKEN_O;
}

function tirada() {
        return
        [[token(), token(), token()],
        [token(), token(), token()],
        [token(), token(), token()]];
}



$tirada1 = tirada();
$jugada1 = new TresEnRaya($tirada1);
echo PHP_EOL . $jugada1->evaluarPartida() . PHP_EOL . PHP_EOL;

$tirada2 = tirada();
$jugada2 = new TresEnRaya($tirada2);
echo PHP_EOL . $jugada2->evaluarPartida() . PHP_EOL . PHP_EOL;

$tirada3 = tirada();
$jugada3 = new TresEnRaya($tirada3);
echo PHP_EOL . $jugada3->evaluarPartida() . PHP_EOL . PHP_EOL;






