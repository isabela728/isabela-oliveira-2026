<!-- Uma empresa deseja criar uma biblioteca reutilizável de funções para ser utilizada em
diversos sistemas.
Crie um arquivo chamado funcoes.php contendo, no mínimo, 10 funções úteis, como:
● Calcular IMC;
● Validar e-mail;
● Gerar senha aleatória;
● Contar vogais;
● Inverter texto;
● Calcular idade;
● Converter moeda;
● Formatar telefone;
● Gerar saudação conforme o horário;
● Validar uma senha forte.
Depois, desenvolva um arquivo index.php que demonstre a utilização de todas as
funções implementadas, exibindo exemplos práticos de cada uma delas. -->


<?php

function calcularIMC(float $peso, float $altura): array {
    if ($altura <= 0 || $peso <= 0) {
        return ['imc' => 0, 'classificacao' => 'Dados inválidos'];
    }

    $imc = $peso / ($altura * $altura);

    if ($imc < 18.5) {
        $classificacao = 'Abaixo do peso';
    } elseif ($imc < 24.9) {
        $classificacao = 'Peso normal';
    } elseif ($imc < 29.9) {
        $classificacao = 'Sobrepeso';
    } elseif ($imc < 34.9) {
        $classificacao = 'Obesidade grau I';
    } elseif ($imc < 39.9) {
        $classificacao = 'Obesidade grau II';
    } else {
        $classificacao = 'Obesidade grau III';
    }

    return ['imc' => round($imc, 2), 'classificacao' => $classificacao];
}

/**
 * 2. Validar e-mail
 */
function validarEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * 3. Validar CPF
 */
function validarCPF(string $cpf): bool {
    $cpf = preg_replace('/\D/', '', $cpf);

    if (strlen($cpf) !== 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    // Calcula primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += (int)$cpf[$i] * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : 11 - $resto;

    if ((int)$cpf[9] !== $digito1) {
        return false;
    }

    // Calcula segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += (int)$cpf[$i] * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : 11 - $resto;

    return (int)$cpf[10] === $digito2;
}

/**
 * 4. Calcular idade a partir da data de nascimento
 */
function calcularIdade(string $dataNascimento): int|string {
    $partes = explode('/', $dataNascimento);

    if (count($partes) !== 3) {
        return 'Formato de data inválido. Use dd/mm/aaaa';
    }

    $dia = (int) $partes[0];
    $mes = (int) $partes[1];
    $ano = (int) $partes[2];

    if (!checkdate($mes, $dia, $ano)) {
        return 'Data inválida';
    }

    $nascimento = new DateTime("$ano-$mes-$dia");
    $hoje = new DateTime();
    $diferenca = $hoje->diff($nascimento);

    return $diferenca->y;
}

/**
 * 5. Converter moeda (Real para Dólar e vice-versa)
 */
function converterMoeda(float $valor, string $de = 'BRL', float $cotacao = 5.50): array {
    $de = strtoupper($de);

    if ($de === 'BRL') {
        $convertido = $valor / $cotacao;
        $para = 'USD';
        $simboloOrigem = 'R$';
        $simboloDestino = 'US$';
    } else {
        $convertido = $valor * $cotacao;
        $para = 'BRL';
        $simboloOrigem = 'US$';
        $simboloDestino = 'R$';
    }

    return [
        'original'       => "$simboloOrigem " . number_format($valor, 2, ',', '.'),
        'convertido'     => "$simboloDestino " . number_format($convertido, 2, ',', '.'),
        'valor_numerico' => round($convertido, 2),
        'cotacao'        => $cotacao,
        'de'             => $de,
        'para'           => $para
    ];
}

/**
 * 6. Formatar telefone brasileiro
 */
function formatarTelefone(string $telefone): string {
    $telefone = preg_replace('/\D/', '', $telefone);

    if (strlen($telefone) === 11) {
        return sprintf('(%s) %s-%s', substr($telefone, 0, 2), substr($telefone, 2, 5), substr($telefone, 7));
    } elseif (strlen($telefone) === 10) {
        return sprintf('(%s) %s-%s', substr($telefone, 0, 2), substr($telefone, 2, 4), substr($telefone, 6));
    }

    return 'Número inválido';
}

/**
 * 7. Gerar saudação conforme o horário
 */
function gerarSaudacao(?int $hora = null): string {
    if ($hora === null) {
        date_default_timezone_set('America/Sao_Paulo');
        $hora = (int) date('H');
    }

    if ($hora >= 6 && $hora < 12) {
        return 'Bom dia';
    } elseif ($hora >= 12 && $hora < 18) {
        return 'Boa tarde';
    } else {
        return 'Boa noite';
    }
}

/**
 * 8. Formatar CEP
 */
function formatarCEP($cep) {
    $cep = preg_replace('/\D/', '', $cep);

    if (strlen($cep) == 8) {
        return substr($cep, 0, 5) . '-' . substr($cep, 5, 3);
    }

    return 'CEP inválido';
}

/**
 * 9. Calcular porcentagem
 */
function calcularPorcentagem(float $valor, float $porcentagem): array {
    $resultado = ($valor * $porcentagem) / 100;

    return [
        'valor_original' => $valor,
        'porcentagem'    => $porcentagem,
        'resultado'      => round($resultado, 2),
        'valor_final'    => round($valor + $resultado, 2)
    ];
}

/**
 * 10. Verificar se um ano é bissexto
 */
function verificarAnoBissexto(int $ano): bool {
    return ($ano % 4 === 0 && $ano % 100 !== 0) || ($ano % 400 === 0);
}
