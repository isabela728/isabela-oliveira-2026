<!-- Uma empresa deseja proteger pequenas mensagens antes de armazená-las em seu
sistema.
Crie uma função chamada criptografarMensagem() que receba um texto e aplique
uma criptografia utilizando o método da Cifra de César.
Em seguida, crie outra função chamada descriptografarMensagem() capaz de
recuperar o texto original. -->

<?php

function criptografarMensagem($texto, $deslocamento)
{
    $resultado = '';

    for($i = 0; $i < mb_strlen($texto); $i++) {
        $caractere = $texto[$i];
        $codigo = ord($caractere);

        if ($codigo >= 65 && $codigo <= 90) {
            $resultado .= chr((($codigo - 65 + $deslocamento) % 26) + 65);
        }
        
        elseif ($codigo >= 97 && $codigo <= 122) {
            $resultado .= chr((($codigo - 97 + $deslocamento) % 26) + 97);
        }
        
        else {
            $resultado .= $caractere;
        }
    }

    return $resultado;
}

function descriptografarMensagem($texto, $deslocamento)
{
    $resultado = '';

    for($i = 0; $i < mb_strlen($texto); $i++) {
        $caractere = $texto[$i];
        $codigo = ord($caractere);

        if ($codigo >= 65 && $codigo <= 90) {
            $resultado .= chr((($codigo - 65 - ($deslocamento % 26) + 26) % 26) + 65);
        }
        
        elseif ($codigo >= 97 && $codigo <= 122) {
            $resultado .= chr((($codigo - 97 - ($deslocamento % 26) + 26) % 26) + 97);
        }
        
        else {
            $resultado .= $caractere;
        }
    }

    return $resultado;
}

$texto = "O Marco disse oi";
$deslocamento = 3;

$criptografada = criptografarMensagem($texto, $deslocamento);
$descriptografada = descriptografarMensagem($criptografada, $deslocamento);

echo "Texto Criptografado: " . $criptografada . "<br>\n";
echo "Texto Descriptografado: " . $descriptografada . "<br>\n";

?>