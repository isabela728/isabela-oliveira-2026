<!-- Uma empresa de segurança digital deseja validar automaticamente as senhas criadas
pelos colaboradores.
Crie uma função chamada analisarSenha() que receba uma senha e retorne um
array contendo:
● Quantidade de letras maiúsculas;
● Quantidade de letras minúsculas;
● Quantidade de números;
● Quantidade de caracteres especiais;
● Tamanho da senha;
● Nível de segurança:
   Fraca
   Média
   Forte
   Muito Forte
A classificação deve considerar:
● mínimo de 8 caracteres;
● presença de letras maiúsculas;
● letras minúsculas;
● números;
● caracteres especiais.
Requisitos
● Criar pelo menos 5 funções.
● Não repetir código.
● Cada função deve possuir apenas uma responsabilidade.
Dica de execução
1. Crie uma função para contar letras maiúsculas.
2. Outra para contar números.
3. Outra para contar caracteres especiais.
4. Crie uma função responsável apenas por classificar a senha.
5. A função principal apenas organiza o relatório. -->

<?php

function contarLetrasMaiusculas($senha)
{
    return preg_match_all('/\p{Lu}/u', $senha);
}

function contarLetrasMinusculas($senha)
{
    return preg_match_all('/\p{Ll}/u', $senha);
}

function contarNumeros($senha) {
    return preg_match_all('/\d/', $senha);
}

function contarCaracteresEspeciais($senha)
{
    return preg_match_all('/[^a-zA-Z\d]/', $senha);
}

function classificarSenha($tamanho, $quantidade_maiusculas, $quantidade_minuculas, $quantidade_numeros, $quantidade_especiais)
{
    $pontuacao = 0;
    if ($tamanho >=8){
        $pontuacao++;    
    } 
    if ($quantidade_maiusculas > 0){
        $pontuacao++;
    }
    if ($quantidade_minuculas > 0){
        $pontuacao++;
    }
    if ($quantidade_numeros > 0){
        $pontuacao++;
    }
    if ($quantidade_especiais > 0){
        $pontuacao++;
    }

    if ($pontuacao == 5){
        return "Muito Forte";
    } else if ($pontuacao == 4){
        return "Forte";
    } else if ($pontuacao == 3){
        return "Média";
    } else {
        return "Fraca";
    }

}

function analisarSenha($senha) {
    $quantidade_maiusculas = contarLetrasMaiusculas($senha);
    $quantidade_minusculas = contarLetrasMinusculas($senha);
    $quantidade_numeros = contarNumeros($senha);
    $quantidade_especiais = contarCaracteresEspeciais($senha);
    $tamanho = strlen($senha);
    $nivel_seguranca = classificarSenha($tamanho, $quantidade_maiusculas, $quantidade_minusculas, $quantidade_numeros, $quantidade_especiais);

    return [
        "maiúsculas" => $quantidade_maiusculas,
        "minúsculas" => $quantidade_minusculas,
        "números" => $quantidade_numeros,
        "especiais" => $quantidade_especiais,
        "tamanho" => $tamanho,
        "nível_de_segurança" => $nivel_seguranca
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST['senha'];
    $resultado = analisarSenha($senha);

    $mensagem = "Quantidade de letras maiúsculas: " . $resultado['maiúsculas'] . "<br>";
    $mensagem .= "Quantidade de letras minúsculas: " . $resultado['minúsculas'] . "<br>";
    $mensagem .= "Quantidade de números: " . $resultado['números'] . "<br>";
    $mensagem .= "Quantidade de caracteres especiais: " . $resultado['especiais'] . "<br>";
    $mensagem .= "Tamanho da senha: " . $resultado['tamanho'] . "<br>";
    $mensagem .= "Nível de segurança: " . $resultado['nível_de_segurança'] . "<br>";
}

?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 16</title>
</head>
<body>

    <form action="" method="post">
        <label for="pesquisa">Digite sua senha:</label>
        <input type="text" name="senha" id="senha" value="<?php echo isset($_POST['senha']) ? htmlspecialchars($_POST['senha']) : ''; ?>">
        <input type="submit" value="Analizar">
    </form>

    <div>
        <?php echo $mensagem; ?>
    </div>

</body>
</html>