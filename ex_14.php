<!-- Uma empresa de análise de dados precisa gerar informações estatísticas sobre uma
coleção de números.
Crie uma função chamada estatisticasNumericas() que receba um vetor de
números e retorne:
● Soma;
● Média;
● Maior valor;
● Menor valor;
● Mediana;
● Quantidade de números pares;
● Quantidade de números ímpares. -->

<?php 

function estatisticasNumericas($numeros)
{
    $maior = max($numeros);
    $menor = min($numeros);

    $soma = 0;
    for ($i = 0; $i < count($numeros); $i++){
        $soma += $numeros[$i];
    }

    $quantidade = count($numeros);
    $media = $soma / $quantidade;

    $ordenados = $numeros;
    sort($ordenados);
    $meio = floor($quantidade / 2);

    if ($quantidade % 2 != 0) {
        $mediana = $ordenados[$meio];
    } else {
        $mediana = ($ordenados[$meio - 1] + $ordenados[$meio]) / 2;
    }

    $pares = 0;
    $impares = 0;
    for ($i = 0; $i < count($numeros); $i++) {
        if ($numeros[$i] % 2 == 0) {
            $pares++;
        } else {
            $impares++;
        }
    }

    return [
        "soma" => $soma,
        "media" => $media,
        "maior" => $maior,
        "menor" => $menor,
        "mediana" => $mediana,
        "pares" => $pares,
        "impares" => $impares
    ];
}

$numeros = [8, 5, 6, 7, 2];

$resultado = estatisticasNumericas($numeros);

echo 'Todos os números: ' . implode(', ', $numeros) . '<br><br>';
echo "Soma: " . $resultado['soma'] . "<br>";
echo "Média: " . $resultado['media'] . "<br>";
echo "Maior valor: " . $resultado['maior'] . "<br>";
echo "Menor valor: " . $resultado['menor'] . "<br>";
echo "Mediana: " . $resultado['mediana'] . "<br>";
echo "Quantidade de pares: " . $resultado['pares'] . "<br>";
echo "Quantidade de ímpares: " . $resultado['impares'] . "<br>";

?>