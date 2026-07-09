<!-- Uma plataforma de ensino deseja verificar algumas propriedades dos números
informados pelos alunos.
Crie uma função chamada analisarNumero() que receba um número inteiro e
informe se ele é:
● Par ou ímpar;
● Primo ou não;
● Perfeito ou não.
Retorne a todas essas informações. -->

<?php

function analisarNumero($numero)
{
    // Verifica se é par ou ímpar
    if ($numero % 2 == 0) {
        echo "Par <br>";
    } else {
        echo "Ímpar <br>";
    }


    $primo_ou_nao = true;

    if ($numero <= 1) {
        $primo_ou_nao = false;
    } else {
        for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                $primo_ou_nao = false;
                break;
            }
        }
    }

    if ($primo_ou_nao) {
        echo "É primo <br>";
    } else {
        echo "Não é primo <br>";
    }


    $divisores = "";
    $soma = 0;

    for ($i = 1; $i < $numero; $i++) {
        if ($numero % $i == 0) {
            $soma += $i;
            $divisores .= $i . " ";
        }
    }

    if ($soma == $numero) {
        echo "É um número perfeito.<br>";
    } else {
        echo "Não é um número perfeito.<br>";
    }
}

$numero = 5;

echo "O número $numero é:<br>";

analisarNumero($numero);

?>

