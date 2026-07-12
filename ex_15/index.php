<?php
require_once 'funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Demonstração - funcoes.php</title>
</head>
<body>

<h1>Demonstração das Funções - funcoes.php</h1>

<hr>

<h2>1. Calcular IMC</h2>
<?php $imc = calcularIMC(75, 1.75); ?>
<p>Peso: 75kg | Altura: 1.75m</p>
<p>IMC: <?= $imc['imc'] ?> - <?= $imc['classificacao'] ?></p>

<hr>

<h2>2. Validar E-mail</h2>
<?php
$emails = ['usuario@email.com', 'email_invalido@', 'teste@dominio.com.br'];
foreach ($emails as $email):
    $valido = validarEmail($email);
?>
    <p><?= $email ?> - <?= $valido ? 'Válido' : 'Inválido' ?></p>
<?php endforeach; ?>

<hr>

<h2>3. Validar CPF</h2>
<?php
$cpfs = ['529.982.247-25', '111.111.111-11', '123.456.789-00'];
foreach ($cpfs as $cpf):
    $valido = validarCPF($cpf);
?>
    <p><?= $cpf ?> - <?= $valido ? 'Válido' : 'Inválido' ?></p>
<?php endforeach; ?>

<hr>

<h2>4. Calcular Idade</h2>
<?php
$datas = ['15/03/2000', '01/01/1990'];
foreach ($datas as $data):
?>
    <p>Nascido em <?= $data ?> - <?= calcularIdade($data) ?> anos</p>
<?php endforeach; ?>

<hr>

<h2>5. Converter Moeda</h2>
<?php
$brlUsd = converterMoeda(1000, 'BRL', 5.50);
$usdBrl = converterMoeda(200, 'USD', 5.50);
?>
<p>Cotação: R$ 5,50 por dólar</p>
<p><?= $brlUsd['original'] ?> = <?= $brlUsd['convertido'] ?></p>
<p><?= $usdBrl['original'] ?> = <?= $usdBrl['convertido'] ?></p>

<hr>

<h2>6. Formatar Telefone</h2>
<p>11987654321 - <?= formatarTelefone('11987654321') ?></p>
<p>1134567890 - <?= formatarTelefone('1134567890') ?></p>

<hr>

<h2>7. Saudação por Horário</h2>
<p>Agora (<?= date('H:i') ?>): <?= gerarSaudacao() ?></p>
<p>09h: <?= gerarSaudacao(9) ?> | 14h: <?= gerarSaudacao(14) ?> | 21h: <?= gerarSaudacao(21) ?></p>

<hr>

<h2>8. Formatar CEP</h2>
<?php
$ceps = ['01001000', '12345678', '123'];
foreach ($ceps as $cep):
?>
    <p><?= $cep ?> - <?= formatarCEP($cep) ?></p>
<?php endforeach; ?>

<hr>

<h2>9. Calcular Porcentagem</h2>
<?php $porc = calcularPorcentagem(250, 15); ?>
<p>15% de R$ 250,00 = R$ <?= number_format($porc['resultado'], 2, ',', '.') ?></p>
<p>Valor final (com acréscimo): R$ <?= number_format($porc['valor_final'], 2, ',', '.') ?></p>

<hr>

<h2>10. Verificar Ano Bissexto</h2>
<?php
$anos = [2024, 2025, 2000, 1900];
foreach ($anos as $ano):
?>
    <p><?= $ano ?> - <?= verificarAnoBissexto($ano) ? 'Bissexto' : 'Não é bissexto' ?></p>
<?php endforeach; ?>

</body>
</html>
