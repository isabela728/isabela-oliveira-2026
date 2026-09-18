# Exercicios de Algoritmos e Estruturas em PHP

Este repositorio contem uma colecao de exercicios desenvolvidos em PHP. Os scripts abordam conceitos de manipulacao de strings, estruturas condicionais e de repeticao, funcoes utilitarias, analise estatistica de dados e organizacao de estruturas complexas de dados (arrays multidimensionais).

## Estrutura do Repositorio

Abaixo esta a descricao detalhada de cada exercicio disponivel no projeto:

### Exercicio 01: Calculo de Formula Matematica
- Arquivo: ex_01.php
- Descricao: Automatiza o calculo da formula (x^2 + y^2) / (x + y) com tratamento de erro para divisao por zero.

### Exercicio 02: Inversao de Texto e Contagem
- Arquivo: ex_02.php
- Descricao: Inverte uma string e contabiliza o numero total de caracteres utilizando funcoes de manipulacao de texto.

### Exercicio 03: Mascaramento de CPF
- Arquivo: ex_03.php
- Descricao: Protege dados sensiveis substituindo os primeiros digitos do CPF por asteriscos, mantendo visiveis apenas os ultimos quatro digitos.

### Exercicio 04: Gerador de Senhas Aleatorias
- Arquivo: ex_04.php
- Descricao: Gera senhas aleatorias com tamanho customizavel contendo letras maiusculas, minusculas, numeros e caracteres especiais.

### Exercicio 05: Analise Textual Basica
- Arquivo: ex_05.php
- Descricao: Conta a quantidade de palavras, caracteres, vogais e consoantes presentes em um determinado texto.

### Exercicio 06: Conversor de Temperaturas
- Arquivo: ex_06.php
- Descricao: Realiza a conversao entre as escalas termometricas Celsius, Fahrenheit e Kelvin.

### Exercicio 07: Calculo de Desconto Progressivo
- Arquivo: ex_07.php
- Descricao: Calcula descontos aplicados a compras com base no valor total acumulado (faixas de desconto de 10%, 20% e 30%).

### Exercicio 08: Ordenacao de Nomes sem Acentos
- Arquivo: ex_08.php
- Descricao: Normaliza uma lista de nomes removendo acentuacao e espacos sobressalentes, ordenando-os em ordem alfabetica.

### Exercicio 09: Analise de Propriedades Numericas
- Arquivo: ex_09.php
- Descricao: Avalia um numero inteiro e identifica se ele e par/impar, primo e se e um numero perfeito.

### Exercicio 10: Calculo de Medias Escolares
- Arquivo: ex_10.php
- Descricao: Processa um conjunto de notas informando a maior nota, a menor nota, a media aritmetica e a situacao final do aluno (Aprovado, Recuperacao ou Reprovado).

### Exercicio 11: Formatacao de Texto
- Arquivo: ex_11.php
- Descricao: Converte textos para maiusculas, minusculas, primeira letra em maiuscula por palavra (Title Case) e exibe o comprimento total.

### Exercicio 12: Gestao e Analise de Produtos
- Arquivo: ex_12.php
- Descricao: Recebe um catalogo de produtos com nomes e precos, identificando o produto mais caro, o mais barato, a media de precos e permite busca por nome.

### Exercicio 13: Criptografia com Cifra de Cesar
- Arquivo: ex_13.php
- Descricao: Implementa as funcoes de criptografia e descriptografia de mensagens com deslocamento configuravel de caracteres (Cifra de Cesar).

### Exercicio 14: Estatisticas Numericas Avancadas
- Arquivo: ex_14.php
- Descricao: Processa um vetor numerico e calcula soma, media, maior valor, menor valor, mediana, quantidade de pares/impares e desvio padrao.

### Exercicio 15: Biblioteca de Funcoes Utilitarias
- Diretorio: ex_15/
  - funcoes.php: Modulo com funcoes utilitarias reutilizaveis.
  - index.php: Interface/demonstracao de execucao das funcoes.
- Descricao: Inclui calculo de IMC, validacao de CPF e E-mail, calculo de idade, conversao de moedas, formatacao de telefones e CEPs, geracao de saudacao dinamica por horario, calculos de porcentagem e verificacao de ano bissexto.

### Exercicio 16: Analisador de Complexidade de Senhas
- Arquivo: ex_16.php
- Descricao: Analisa a estrutura de uma senha (quantidade de letras maiusculas, minusculas, numeros e simbolos) e atribui uma classificacao de seguranca (Muito Fraca, Fraca, Media, Forte, Muito Forte).

### Exercicio 17: Processamento e Sanitizacao de Texto
- Arquivo: ex_17.php
- Descricao: Realiza analise profunda de texto, contando caracteres, palavras, frases, identificando palavras mais frequentes, removendo espacos duplicados e formatando o texto final.

### Exercicio 18: Sistema de Organizacao de Agenda Medica
- Arquivo: ex_18.php
- Descricao: Gerencia consultas medicas ordenando horarios, agrupando por especialidade, identificando conflitos de horario, buscando pacientes e calculando estatisticas gerais de atendimento.

## Requisitos do Sistema

- Servidor web local (XAMPP, WAMP, PHP Built-in Server) ou execucao via CLI (Linha de Comando).

## Como Executar os Exercicios

### Execucao via Linha de Comando (CLI)

Navegue ate a pasta do projeto no terminal e execute o arquivo desejado utilizando o interpretador do PHP:

```bash
php ex_01.php
```

Para exercicios que residem em subpastas (como o exercicio 15):

```bash
php ex_15/index.php
```

### Execucao via Servidor Embutido do PHP

Voce tambem pode iniciar o servidor embutido do PHP na raiz do repositorio:

```bash
php -S localhost:8000
```

Em seguida, acesse no seu navegador:
http://localhost:8000/ex_01.php ou navegue entre os arquivos diretamente.

## Tecnologias Utilizadas

- PHP (Linguagem Principal)
- HTML (Formatacao de saida em navegador)
