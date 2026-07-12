<?php
/*
Um supermercado deseja organizar automaticamente seu catálogo de produtos.
Crie uma função chamada analisarProdutos() que receba um vetor contendo o
nome e o preço dos produtos.
A função deverá retornar:
● Produto mais caro;
● Produto mais barato;
● Média dos preços;
● Pesquisa de um produto informado pelo usuário.
*/


function analisarProdutos($produtos, $pesquisa)
{
    $mais_caro_preco = max(array_column($produtos, 'preco'));
    $indice_mais_caro = array_search($mais_caro_preco, array_column($produtos, 'preco'));
    $mais_caro = $produtos[$indice_mais_caro]['nome'];

    $mais_barato_preco = min(array_column($produtos, 'preco'));
    $indice_mais_barato = array_search($mais_barato_preco, array_column($produtos, 'preco'));
    $mais_barato = $produtos[$indice_mais_barato]['nome'];


    $soma = 0;

    foreach ($produtos as $produto) {
        $soma += $produto['preco'];
    }

    $media = $soma / count($produtos);

    $produto_encontrado = null;

    if (!empty($pesquisa)){
        foreach ($produtos as $produto) {
            if (stripos($produto['nome'], $pesquisa) !== false) {
                $produto_encontrado = $produto;
                break;
            }
        }
    }

    return [
        "mais_caro" => $mais_caro,
        "mais_barato" => $mais_barato,
        "media" => $media,
        "encontrado" => $produto_encontrado
    ];
}

$produtos = [
    ["nome" => "Arroz", "preco" => 5.99],
    ["nome" => "Feijão", "preco" => 7.49],
    ["nome" => "Macarrão", "preco" => 3.99],
    ["nome" => "Açúcar", "preco" => 4.49],
    ["nome" => "Óleo", "preco" => 6.29]
];

session_start();

$pesquisa = '';
$mensagemPesquisa = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pesquisa = isset($_POST['pesquisa']) ? trim($_POST['pesquisa']) : '';
    $resultado = analisarProdutos($produtos, $pesquisa);

    if ($pesquisa !== '') {
        if ($resultado['encontrado']) {
            $_SESSION['mensagemPesquisa'] = '<p>Produto pesquisado: ' . htmlspecialchars($resultado['encontrado']['nome'], ENT_QUOTES, 'UTF-8') . ' - R$ ' . number_format($resultado['encontrado']['preco'], 2, ',', '.') . '</p>';
        } else {
            $_SESSION['mensagemPesquisa'] = '<p>Produto não encontrado </p>';
        }
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_SESSION['mensagemPesquisa'])) {
    $mensagemPesquisa = $_SESSION['mensagemPesquisa'];
    unset($_SESSION['mensagemPesquisa']);
}

$resultado = analisarProdutos($produtos, $pesquisa);

$resumoPrecos = '';
$resumoPrecos .= "Produto mais caro: " . $resultado['mais_caro'] . "<br>";
$resumoPrecos .= "Produto mais barato: " . $resultado['mais_barato'] . "<br>";
$resumoPrecos .= "Média dos preços: " . number_format($resultado['media'], 2, ',', '.') . "<br>";

?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if ($resumoPrecos !== ''): ?>
        <div>
            <?php echo $resumoPrecos; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="pesquisa">Pesquisar produto:</label>
        <input type="text" name="pesquisa" id="pesquisa" value="<?php echo htmlspecialchars($pesquisa, ENT_QUOTES, 'UTF-8'); ?>">
        <input type="submit" value="Pesquisar">
    </form>

    <div>
        <?php echo $mensagemPesquisa; ?>
    </div>

</body>
</html>