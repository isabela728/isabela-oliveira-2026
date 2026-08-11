<!-- Uma clínica deseja organizar automaticamente sua agenda de consultas.
Cada consulta possui:
● Nome do paciente;
● Especialidade;
● Data;
● Horário.
Crie uma função chamada organizarAgenda() que receba um vetor multidimensional
contendo todas as consultas.
Ela deverá retornar:
● Quantidade total de consultas;
● Quantidade de pacientes diferentes;
● Quantidade de consultas por especialidade;
● Primeiro atendimento do dia;
● Último atendimento do dia;
● Lista ordenada pelo horário;
● Pesquisa de um paciente informado pelo usuário;
● Verificar se existem horários duplicados.
Requisitos
● Utilizar vetores multidimensionais.
● Modularizar a solução em pelo menos 6 funções.
● Retornar todas as informações em um único array.
Dica de execução
1. Crie uma função para ordenar os horários.
2. Outra para pesquisar pacientes.
3. Outra para contar especialidades.
4. Utilize arrays associativos para contar ocorrências.
5. A função principal apenas reúne os resultados produzidos pelas funções
auxiliares. -->

<?php

function contarTotalConsultas(array $consultas): int
{
    return count($consultas);
}


function contarPacientesDiferentes(array $consultas): int
{
    $pacientesUnicos = [];

    foreach ($consultas as $consulta) {
        // Usando o nome do paciente como chave para garantir que cada paciente seja contado apenas uma vez
        $pacientesUnicos[$consulta['paciente']] = true;
    }

    return count($pacientesUnicos);
}

function contarPorEspecialidade(array $consultas): array
{
    $totalPorEspecialidade = [];

    foreach ($consultas as $consulta) {
        $especialidade = $consulta['especialidade'];

        if (!isset($totalPorEspecialidade[$especialidade])) {
            $totalPorEspecialidade[$especialidade] = 0;
        }

        $totalPorEspecialidade[$especialidade]++;
    }

    return $totalPorEspecialidade;
}

function ordenarPorHorario(array $consultas): array
{
    $consultasOrdenadas = $consultas; // evita alterar o vetor original

    usort($consultasOrdenadas, function ($a, $b) {
        return strcmp($a['horario'], $b['horario']);
    });

    return $consultasOrdenadas;
}

function obterPrimeiroUltimoAtendimento(array $consultasOrdenadas): array
{
    if (empty($consultasOrdenadas)) {
        return ['primeiro' => null, 'ultimo' => null];
    }

    return [
        'primeiro' => $consultasOrdenadas[0],
        'ultimo'   => $consultasOrdenadas[count($consultasOrdenadas) - 1],
    ];
}

function pesquisarPaciente(array $consultas, string $nomePesquisado): array
{
    $resultado = [];
    $nomePesquisado = mb_strtolower(trim($nomePesquisado));

    foreach ($consultas as $consulta) {
        if (mb_stripos(mb_strtolower($consulta['paciente']), $nomePesquisado) !== false) {
            $resultado[] = $consulta;
        }
    }

    return $resultado;
}

function verificarHorariosDuplicados(array $consultas): array
{
    $ocorrencias = [];   // array para armazenar as ocorrências de cada horário
    $duplicados  = [];   // lista de horários duplicados

    foreach ($consultas as $consulta) {
        $chave = $consulta['data'] . ' ' . $consulta['horario'];

        if (!isset($ocorrencias[$chave])) {
            $ocorrencias[$chave] = [];
        }

        $ocorrencias[$chave][] = $consulta;
    }

    foreach ($ocorrencias as $chave => $listaConsultas) {
        if (count($listaConsultas) > 1) {
            $duplicados[$chave] = $listaConsultas;
        }
    }

    return [
        'existemDuplicados' => count($duplicados) > 0,
        'detalhes'          => $duplicados,
    ];
}

function organizarAgenda(array $consultas, string $pacientePesquisado = ''): array
{
    $consultasOrdenadas = ordenarPorHorario($consultas);
    $primeiroUltimo     = obterPrimeiroUltimoAtendimento($consultasOrdenadas);

    return [
        'totalConsultas'        => contarTotalConsultas($consultas),
        'pacientesDiferentes'   => contarPacientesDiferentes($consultas),
        'consultasPorEspecialidade' => contarPorEspecialidade($consultas),
        'primeiroAtendimento'   => $primeiroUltimo['primeiro'],
        'ultimoAtendimento'     => $primeiroUltimo['ultimo'],
        'agendaOrdenada'        => $consultasOrdenadas,
        'resultadoPesquisa'     => $pacientePesquisado !== ''
                                    ? pesquisarPaciente($consultas, $pacientePesquisado)
                                    : [],
        'horariosDuplicados'    => verificarHorariosDuplicados($consultas),
    ];
}


$consultas = [
    ['paciente' => 'Ana Souza',    'especialidade' => 'Cardiologia',  'data' => '2026-08-11', 'horario' => '09:00'],
    ['paciente' => 'Carlos Lima',  'especialidade' => 'Dermatologia', 'data' => '2026-08-11', 'horario' => '08:30'],
    ['paciente' => 'Bruna Alves',  'especialidade' => 'Cardiologia',  'data' => '2026-08-11', 'horario' => '10:15'],
    ['paciente' => 'Ana Souza',    'especialidade' => 'Ortopedia',    'data' => '2026-08-11', 'horario' => '11:00'],
    ['paciente' => 'Diego Prado',  'especialidade' => 'Pediatria',    'data' => '2026-08-11', 'horario' => '08:30'],
    ['paciente' => 'Elaine Reis',  'especialidade' => 'Dermatologia', 'data' => '2026-08-11', 'horario' => '13:45'],
];

$buscar = $_POST['buscar'] ?? '';
$agenda = organizarAgenda($consultas, $buscar);

$mensagemResumo = '';
$mensagemPesquisa = '';
$mensagemDuplicados = '';

$mensagemResumo .= "Total de consultas: {$agenda['totalConsultas']}<br>";
$mensagemResumo .= "Pacientes diferentes: {$agenda['pacientesDiferentes']}<br>";
$mensagemResumo .= "<br>Consultas por especialidade:<br>";
foreach ($agenda['consultasPorEspecialidade'] as $especialidade => $qtd) {
    $mensagemResumo .= "- $especialidade: $qtd<br>";
}
$mensagemResumo .= "<br>Primeiro atendimento: {$agenda['primeiroAtendimento']['paciente']} às {$agenda['primeiroAtendimento']['horario']}<br>";
$mensagemResumo .= "Último atendimento: {$agenda['ultimoAtendimento']['paciente']} às {$agenda['ultimoAtendimento']['horario']}<br>";
$mensagemResumo .= "<br>Agenda ordenada por horário:<br>";
foreach ($agenda['agendaOrdenada'] as $c) {
    $mensagemResumo .= "- {$c['horario']} - {$c['paciente']} ({$c['especialidade']})<br>";
}

if ($buscar !== '') {
    if (!empty($agenda['resultadoPesquisa'])) {
        foreach ($agenda['resultadoPesquisa'] as $c) {
            $mensagemPesquisa .= "- {$c['data']} {$c['horario']} - {$c['especialidade']}<br>";
        }
    } else {
        $mensagemPesquisa .= "Nenhum paciente encontrado.<br>";
    }
}

if ($agenda['horariosDuplicados']['existemDuplicados']) {
    foreach ($agenda['horariosDuplicados']['detalhes'] as $chave => $lista) {
        $mensagemDuplicados .= "Conflito em $chave:<br>";
        foreach ($lista as $c) {
            $mensagemDuplicados .= "- {$c['paciente']} ({$c['especialidade']})<br>";
        }
    }
} else {
    $mensagemDuplicados .= "Sem horários duplicados.<br>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Consultas</title>
</head>
<body>

    <form action="" method="post">
        <label for="pesquisa">Buscar paciente:</label>
        <input type="text" name="buscar" id="pesquisa" value="<?php echo htmlspecialchars($buscar); ?>">
        <button type="submit">Buscar</button>
    </form>

    <div style="margin-top: 10px;">
        <?php echo $mensagemPesquisa; ?>
    </div>

    <h2>Resumo</h2>
    <div><?php echo $mensagemResumo; ?></div>

    <h2>Duplicados</h2>
    <div><?php echo $mensagemDuplicados; ?></div>
</body>
</html>