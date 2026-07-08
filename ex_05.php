<!-- Uma editora deseja obter algumas informações sobre os textos enviados pelos
autores.
Crie uma função chamada analisarTexto() que receba um texto e retorne:
● Quantidade de palavras;
● Quantidade de caracteres;
● Quantidade de vogais;
● Quantidade de consoantes. -->

<?php

function analisarTexto($texto)
{
    $quantidade_palavras = str_word_count($texto);
    $qantidade_caracteres = strlen($texto);
    $quantidade_vogais = preg_match_all('/[aeiouAEIOU]/', $texto);
    $quantidade_consoantes = preg_match_all('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/', $texto);

    return [
        "quantidade_palavras" => $quantidade_palavras,
        "quantidade_caracteres" => $qantidade_caracteres,
        "quantidade_vogais" => $quantidade_vogais,
        "quantidade_consoantes" => $quantidade_consoantes,
    ];
}

$texto = "Qualquer coisa";

echo "Texto original: $texto <br><br>";

$quantidade_palavras = analisarTexto($texto);
$quantidade_caracteres = analisarTexto($texto);
$quantidade_vogais = analisarTexto($texto);
$quantidade_consoantes = analisarTexto($texto);

echo "Quantidade de palavras: " . $quantidade_palavras['quantidade_palavras'] . "<br>"; 
echo "Quantidade de caracteres: " . $quantidade_caracteres['quantidade_caracteres'] . "<br>"; 
echo "Quantidade de vogais: " . $quantidade_vogais['quantidade_vogais'] . "<br>"; 
echo "Quantidade de consoantes: " . $quantidade_consoantes['quantidade_consoantes'] . "<br>"; 

?>