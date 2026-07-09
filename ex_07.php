<!-- Uma loja virtual oferece descontos conforme o valor da compra.
Crie uma função chamada calcularDesconto() que receba o valor total da compra
e aplique as seguintes regras:
● Até R$ 100,00: sem desconto;
● Acima de R$ 100,00: 10%;
● Acima de R$ 500,00: 20%;
● Acima de R$ 1.000,00: 30%.
Retorne o valor original, o desconto aplicado e o valor final da compra. -->

<?php

function calcularDesconto($valor_compra)
{
    if ($valor_compra <= 100) {
        $desconto = 0;
    }else if ($valor_compra > 100 && $valor_compra <= 500) {
        $desconto = $valor_compra * 0.10;
    } else if ($valor_compra > 500 && $valor_compra <= 1000) {
        $desconto = $valor_compra * 0.20;
    } else if ($valor_compra > 1000) {
        $desconto = $valor_compra * 0.30;
    }

    return $desconto;

}

$valor_compra = 400;

$valor_final = $valor_compra - calcularDesconto($valor_compra);

echo "Valor da compra: R$" . number_format($valor_compra, 2, ',', '.') . "<br>";
echo "Valor do desconto: R$" . number_format(calcularDesconto($valor_compra), 2, ',', '.') . "<br>";
echo "Valor final da compra: R$" . number_format($valor_final, 2, ',', '.') . "<br>";

?>