<!-- Uma escola deseja organizar automaticamente a lista de alunos matriculados.
Crie uma função chamada ordenarNomes() que receba uma string contendo nomes
separados por vírgulas.
A função deverá transformar os nomes em um vetor, remover espaços
desnecessários, ordenar em ordem alfabética e retornar a lista organizada. -->

<?php

function removerAcentos($nomes_lista)
{
    return strtr($nomes_lista, [
        'Á'=>'A','À'=>'A','Ã'=>'A','Â'=>'A','Ä'=>'A',
        'á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a',
        'É'=>'E','È'=>'E','Ê'=>'E','Ë'=>'E',
        'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
        'Í'=>'I','Ì'=>'I','Î'=>'I','Ï'=>'I',
        'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
        'Ó'=>'O','Ò'=>'O','Õ'=>'O','Ô'=>'O','Ö'=>'O',
        'ó'=>'o','ò'=>'o','õ'=>'o','ô'=>'o','ö'=>'o',
        'Ú'=>'U','Ù'=>'U','Û'=>'U','Ü'=>'U',
        'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
        'Ç'=>'C','ç'=>'c'
    ]);
}

function ordenarNomes($nomes_lista)
{
    $nomes = array_map('trim', explode(",", $nomes_lista));

    usort($nomes, function ($a, $b) {
        return strcmp(removerAcentos($a), removerAcentos($b));
    });

    return $nomes;
}

$nomes_lista  = "Thaís, Éwerton, Thalita, Arduíno, Amanda, Ícaro, Julia, Djeniffer";

$nomes_ordenados = ordenarNomes($nomes_lista);


foreach ($nomes_ordenados as $nome) {
    echo $nome . "<br>";
}

?>