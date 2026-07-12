<!-- Uma empresa deseja padronizar automaticamente seus relatórios.
Crie uma função chamada formatarTexto() que receba um texto e retorne:
● O texto totalmente em letras maiúsculas;
● O texto totalmente em letras minúsculas;
● A primeira letra de cada palavra em maiúscula;
● A quantidade total de caracteres. -->

<?php

function formatarTexto($texto)
{
    $maiusculas = strtoupper($texto);
    $minusculas = strtolower($texto);
    $primeira_maiuscula = ucwords($texto);
    $quantidade = mb_strlen(str_replace(' ', '', $texto));

    return [
        "maiusculas" => $maiusculas,
        "minusculas" => $minusculas,
        "primeira_maiuscula" => $primeira_maiuscula,
        "quantidade" => $quantidade
    ];
}

$texto = "Qualquer coisa";

echo "Texto original: $texto <br><br>";

$maiusculas = formatarTexto($texto);
$minusculas = formatarTexto($texto);
$primeira_maiuscula = formatarTexto($texto);
$quantidade = formatarTexto($texto);

echo "Texto em letas maiusculas: " . $maiusculas['maiusculas'] . "<br>";
echo "Texto em letras minusculas: " . $minusculas['minusculas'] . "<br>";
echo "Texto com a primeira letra maiúscula: " . $primeira_maiuscula['primeira_maiuscula'] . "<br>";
echo "quantidade de caracteres: " . $quantidade['quantidade'] . "<br>";

?>