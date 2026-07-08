<!-- Um sistema de cadastro precisa proteger informações sensíveis dos usuários.
Crie uma função chamada mascararCpf() que receba um CPF e substitua todos os
caracteres por *, mantendo visíveis apenas os quatro últimos dígitos.
Retorne o CPF mascarado -->

<?php

function mascararCPF($cpf)
{

    $cpf = str_replace(['.'], '', $cpf);
    $cpf_marcarado = str_repeat('*', strlen($cpf) - 5) . substr($cpf, -5);

    return $cpf_marcarado;
}

$cpf = '123.456.789-00';

echo "CPF mascarado: " .mascararCPF($cpf);

?>