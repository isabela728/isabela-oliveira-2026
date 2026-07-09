<!-- Uma empresa deseja gerar senhas temporárias para seus colaboradores.
Crie uma função chamada gerarSenha() que receba a quantidade de caracteres
desejada e retorne uma senha aleatória contendo letras maiúsculas, minúsculas,
números e caracteres especiais. -->

<?php

function gerarSenha($quantidade)
{

    $minusculas = range('a', 'z');
    $maiusculas = range('A', 'Z');
    $numeros = range('0', '9');
    $especiais = ['!', '@', '#', '$', '%', '&', '*'];
    $caracteres = array_merge($minusculas, $maiusculas, $numeros, $especiais);

    $senha = '';

    $senha .= $minusculas[array_rand($minusculas)];
    $senha .= $maiusculas[array_rand($maiusculas)];
    $senha .= $numeros[array_rand($numeros)];
    $senha .= $especiais[array_rand($especiais)];

    for ($i = 4; $i < $quantidade; $i++) {
        $senha .= $caracteres[array_rand($caracteres)];
    }

    $senhaArray = str_split($senha);
    shuffle($senhaArray);

    return implode($senhaArray);
}

$quantidade = 10;

echo "Senha gerada: " . gerarSenha($quantidade);

?>