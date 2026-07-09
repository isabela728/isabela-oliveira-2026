<!-- Uma empresa que fabrica sensores precisa converter temperaturas entre diferentes
escalas.
Crie uma função chamada converterTemperatura() que receba um valor, a escala
de origem e a escala de destino.
A função deverá permitir conversões entre Celsius, Fahrenheit e Kelvin. -->

<?php

function converterTemperatura($temperatura, $escala_origem, $escala_destino){

    $temperatura_convertida = 0;

    if ($escala_origem == 'Celsius') {
       if ($escala_destino == 'Fahrenheit'){
           $temperatura_convertida = ($temperatura * 1.8) + 32;
       }else if ($escala_destino == 'Kelvin'){
           $temperatura_convertida = $temperatura + 273.15;
       }
    }

    if ($escala_origem == 'Fahrenheit') {
        if ($escala_destino == 'Celsius'){
            $temperatura_convertida = ($temperatura - 32) / 1.8;
        }else if ($escala_destino == 'Kelvin') {
            $temperatura_convertida = (($temperatura - 32) / 1.8) + 273.15;
        }
    }

    if ($escala_origem == 'Kelvin') {
        if ($escala_destino == 'Celsius'){
            $temperatura_convertida = $temperatura - 273.15;
        } else if ($escala_destino == 'Fahrenheit') {
            $temperatura_convertida = (($temperatura - 273.15) * 1.8) + 32;
        }
    }

    return $temperatura_convertida;
}

$temperatura = 80.87;
$escala_origem = 'Celsius';
$escala_destino = 'Kelvin';

echo "Temperatura: " . $temperatura . "<br>";
echo "Escala de origem: " . $escala_origem . "<br>";
echo "Escala de destino: " . $escala_destino . "<br><br>";
echo "temperatura convertida: " . converterTemperatura($temperatura, $escala_origem, $escala_destino) . "<br>";


?>