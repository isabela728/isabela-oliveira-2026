<!-- Uma empresa de tecnologia está desenvolvendo um sistema para tratamento de
textos.
Crie uma função chamada inverterTexto() que receba uma string e retorne o texto
completamente invertido.
Além disso, exiba a quantidade de caracteres existentes na string original. -->

<?php

function inverterTexto($texto)
{
    $texto_invertido = strrev($texto);
    $quantidade = mb_strlen($texto);

    return [
        "texto_invertido" => $texto_invertido,
        "quantidade_caracteres" => $quantidade
    ];
}

$texto = "socorram me subi no onibus em Marrocos";

echo "Texto original: $texto <br>";

$texto_invertido = inverterTexto($texto);
$quantidade = inverterTexto($texto);

echo "Texto invertido: " . $texto_invertido['texto_invertido'] . "<br>";
echo "Quantidade de caracteres: " . $texto_invertido['quantidade_caracteres'] . "<br>";

?>