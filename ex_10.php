<!-- Uma escola precisa automatizar o cálculo das médias dos estudantes.
Crie uma função chamada calcularMedia() que receba um vetor contendo as notas
de um aluno.
A função deverá retornar:
● Maior nota;
● Menor nota;
● Média;
● Situação final (Aprovado, Recuperação ou Reprovado). -->

<?php 

function calcularMedia($notas)
{

    $maior = max($notas);
    $menor = min($notas);

    $soma = 0;
    for ($i = 0; $i < count($notas); $i++){
        $soma += $notas[$i];
    }

    $media = $soma/3;

    if ($media >=7) {
        $situacao = "Aprovado";
    }else if ($media >= 5) {
        $situacao = "Recuperação";
    } else {
        $situacao = "Reprovado";
    }

    return[
        "maior" => $maior,
        "menor" => $menor,
        "media" => $media,
        "situacao" => $situacao
    ];
}

$notas = [8, 5.4, 6.7];

$resultado = calcularMedia($notas);

$maior = $resultado['maior'];
$menor = $resultado['menor'];
$media = $resultado['media'];
$situacao = $resultado['situacao'];

echo 'Todas as notas: ' . implode(', ', $notas) . '<br><br>';

echo "Maior nota: $maior <br>";
echo "Menor nota: $menor <br>";
echo "Média: $media <br>";
echo "Situação final: $situacao";

?>