<!-- Uma empresa de engenharia precisa automatizar alguns cálculos utilizados em seus
projetos.
Crie uma função chamada calcularFormula() que receba dois números e aplique a
seguinte fórmula:
(x2+y2)÷(x+y) -->

<?php

function calcularFormula ($x, $y)
{
    if (($x + $y) == 0) {
        return "Nõ é possível realizar a divipor zero.";
    }

    $resultado = (pow($x, 2) + pow($y, 2)) / ($x +$y);

    return $resultado;

}

$x = 10;
$y = 5;

echo "Valor de X: $x <br>";
echo "Valor de Y: $y <br><br>";
echo "Resultado: " . calcularFormula($x, $y);

?>