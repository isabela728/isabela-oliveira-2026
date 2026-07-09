<!-- Uma empresa que fabrica sensores precisa converter temperaturas entre diferentes
escalas.
Crie uma função chamada converterTemperatura() que receba um valor, a escala
de origem e a escala de destino.
A função deverá permitir conversões entre Celsius, Fahrenheit e Kelvin. -->

<?php

function converterTemperatura($temperatura, $escala_origem, $escala_destino){

    if ($escala_origem != 'Celsius' && $escala_origem != 'Fahrenheit' && $escala_origem != 'Kelvin'){
        return "Escala de origem inválida.";
    }
    if ($escala_destino != 'Celsius' && $escala_destino != 'Fahrenheit' && $escala_destino != 'Kelvin'){
        return "Escala de destino inválida.";
    }


    if ($escala_origem == 'Celsius') {
       if ($escala_destino == 'Fahrenheit'){
           $temperatura_converida = ($temperatura * 1.8) + 32;
           return $temperatura_converida;
       }else if ($escala_destino == 'Kelvin'){
           $temperatura_convertida = $temperatura + 273.15;
           return $temperatura_convertida;
       }
    }

    if ($escala_origem == 'Fahrenheit') {
        if ($escala_destino == 'Celsius'){
            $temperatura_convertida = ($temperatura - 32) / 1.8;
            return $temperatura_convertida;
        }else if ($escala_destino == 'Kelvin') {
            $temperatura_convertida = (($temperatura - 32) / 1.8) + 273.15;
            return $temperatura_convertida;
        }
    }

    if ($escala_origem == 'Kelvin') {
        if ($escala_destino == 'Celsius'){
            $temperatura_convertida = $temperatura - 273.15;
            return $temperatura_convertida;
        } else if ($escala_destino == 'Fahrenheit') {
            $temperatura_convertida = (($temperatura - 273.15) * 1.8) + 32;
            return $temperatura_convertida;
        }
    }

}

$temperatura = 5;
$escala_origem = 'Fahrenheit';
$escala_destino = 'Kelvin';

echo "Temperatura: " . $temperatura . "<br>";
echo "Escala de origem: " . $escala_origem . "<br>";
echo "Escala de destino: " . $escala_destino . "<br><br>";
echo "temperatura convertida: " . converterTemperatura($temperatura, $escala_origem, $escala_destino) . "<br>";


?>