<!-- Uma editora deseja gerar automaticamente estatísticas sobre textos enviados pelos
autores.
Crie uma função chamada processarTexto() que receba um texto e retorne:
● Quantidade de caracteres;
● Quantidade de palavras;
● Quantidade de frases;
● Palavra mais longa;
● Palavra mais curta;
● Quantidade de palavras repetidas;
● Lista das cinco palavras mais frequentes;
● Texto sem espaços duplicados;
● Texto totalmente formatado (Primeira Letra Maiúscula).
Requisitos
● Utilizar funções de manipulação de strings.
● Utilizar arrays.
● Criar pelo menos 6 funções auxiliares.
Dica de execução
1. Utilize explode() para separar as palavras.
2. Utilize array_count_values() para contar repetições.
3. Utilize trim() e preg_replace() para remover espaços extras.
4. Utilize ucwords() para formatar o texto.
5. Utilize um laço para encontrar a maior e a menor palavra. -->

<?php

function quantidadeCaracteres($texto)
{
    return mb_strlen($texto);
}

function quantidadepalavras($texto)
{
    $palavras = preg_split('/\s+/u', trim($texto));
    $palavras = array_filter($palavras, function ($palavra) {
        return mb_strlen($palavra, 'UTF-8') > 1;
    });

    $quanidade_palavras = count($palavras);

    $maior = '';
    foreach ($palavras as $palavra) {
        if (mb_strlen($palavra, 'UTF-8') > mb_strlen($maior, 'UTF-8')) {
            $maior = $palavra;
        }
    }

    $menor = null;
    $menores = [];
    foreach ($palavras as $palavra) {
        $tamanho = mb_strlen($palavra, 'UTF-8');
        if ($menor === null || $tamanho < $menor) {
            $menor = $tamanho;
            $menores = [$palavra];
        } elseif ($tamanho === $menor) {
            $menores[] = $palavra;
        }
    }

    return [
        "quantidade_palavras" => $quanidade_palavras,
        "maior_palavra" => $maior,
        "menor_palavra" => $menor !== null ? implode(', ', array_unique($menores)) : ''
    ];
}

function quantidadeFrases($texto)
{
    return preg_match_all('/[.!?]/', $texto);
}

function palavrasRepetidas($texto)
{
    $palavras = preg_split('/\s+/u', trim($texto));
    $palavras = array_filter($palavras, function ($palavra) {
        return mb_strlen($palavra, 'UTF-8') > 1;
    });

    $quantidade = array_count_values($palavras);
    $repetidas = 0;
    foreach ($quantidade as $palavra => $count) {
        if ($count > 1) {
            $repetidas++;
        }
    }

    arsort($quantidade);
    $mais_frequentes = array_slice($quantidade, 0, 5, true);

    return [
        "quantidade_repetidas" => $repetidas,
        "mais_frequentes" => $mais_frequentes
    ];
}

function semespaco_duplicados($texto)
{
    return preg_replace('/\s+/', ' ', trim($texto));
}

function formatarTexto($texto)
{
    return ucwords($texto);
}

function processarTexto($texto)
{
    $quantidade_caracteres = quantidadeCaracteres($texto);
    $quantidade_palavras = quantidadepalavras($texto);
    $quantidade_frases = quantidadeFrases($texto);
    $palavras_repetidas = palavrasRepetidas($texto);
    $texto_sem_espacos_duplicados = semespaco_duplicados($texto);
    $texto_formatado = formatarTexto($texto);

    return [
        "quantidade_caracteres" => $quantidade_caracteres,
        "quantidade_palavras" => $quantidade_palavras['quantidade_palavras'],
        "maior_palavra" => $quantidade_palavras['maior_palavra'],
        "menor_palavra" => $quantidade_palavras['menor_palavra'],
        "quantidade_frases" => $quantidade_frases,
        "quantidade_repetidas" => $palavras_repetidas['quantidade_repetidas'],
        "mais_frequentes" => $palavras_repetidas['mais_frequentes'],
        "texto_sem_espacos_duplicados" => $texto_sem_espacos_duplicados,
        "texto_formatado" => $texto_formatado
    ];
}

$mensagem = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST['texto'];
    $resultado = processarTexto($texto);

    $mensagem = "Quantidade de caracteres: " . $resultado['quantidade_caracteres'] . "<br><br>";
    $mensagem .= "Quantidade de palavras: " . $resultado['quantidade_palavras'] . "<br><br>";
    $mensagem .= "Quantidade de frases: " . $resultado['quantidade_frases'] . "<br><br>";
    $mensagem .= "Palavra mais longa: " . $resultado['maior_palavra'] . "<br><br>";
    $mensagem .= "Palavras mais curtas: " . $resultado['menor_palavra'] . "<br><br>";
    $mensagem .= "Quantidade de palavras repetidas: " . $resultado['quantidade_repetidas'] . "<br><br>";
    $mensagem .= "Lista das cinco palavras mais frequentes: <br>";
    foreach ($resultado['mais_frequentes'] as $palavra => $quantidade) {
        $mensagem .= $palavra . " - " . $quantidade . "<br>";
    }
    $mensagem .= "Texto sem espaços duplicados: <br>" . $resultado['texto_sem_espacos_duplicados'] . "<br><br>";
    $mensagem .= "Texto totalmente formatado: <br>" . $resultado['texto_formatado'] . "<br><br>";
}




?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 17</title>
</head>
<body>

    <form action="" method="post">
        <label for="pesquisa">Texto:</label>
        <input type="text" name="texto" id="texto" value="<?php echo isset($_POST['texto']) ? $_POST['texto'] : ''; ?>">
        <input type="submit" value="Analizar">
    </form>

    <div>
        <?php echo $mensagem; ?>
    </div>

</body>
</html>