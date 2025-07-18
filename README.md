<!-- PRESENTATION -->

<div align="center">
    <img src="https://github.com/user-attachments/assets/5f6ab906-1cb9-4c3a-959a-94a94b2cda8e" alt="Telecurso2000-pic" width="500px" title="TELECURSO 2000 PHP">
    <h2 align="center">TELECURSO 2000 PHP</h2>
</div>

<div align="center">

  Repositório de aprendizados 'especiais' sobre PHP. <br>Promovido por Evandro Murilo.

<br>
</div>

<!-- SUMMARY -->

<h2 align="center">Sumário 🧾</h2>

<div align="center">
  <p align="center">
    <a href="#-expressões-e-ordem-de-precendência">Expressões e Ordem de Precendência</a> &#xa0; | &#xa0;
    <a href="#-escopos-e-resolução-de-expressões">Escopos e Resolução de Expressões</a>
  </p>
    <a href="#-funções-como-expressão-e-funções-compostas">Funções como Expressão e Funções Compostas</a> &#xa0; | &#xa0;
    <a href="#-operador-ternário">Operador Ternário</a>
   </p>
    <a href="#%EF%B8%8F-arrays">Arrays</a> &#xa0; | &#xa0;
    <a href="#%EF%B8%8F-filas">Fila</a> &#xa0; | &#xa0;
    <a href="#-autor">Autor</a>
</div>

<br>

<!-- ABOUT -->

## ❓ "Telecurso 2000 PHP?"  

É um nome divertido que acabei pensando para o conjunto de aprendizados contínuos promovidos por [**Evandro Murilo**](https://github.com/evandromurilo), através de vários exercícios guiados para alguns colaboradores (incluido eu), com foco em praticar conceitos de PHP de forma incremental. O intuito foi aprender conceitos de lógica de programação e a forma interpretação e execução do PHP.

### 📋 Listagem de tópicos

- **💬 Expressões e Ordem de Precendência**: Como o PHP interpreta expressões e como a partir da ordem de precedência o PHP resolve essas expressões.
- **🌐 Escopos e Resolução de Expressões**: Como o PHP salva informações em escopos diferentes e como a resolução considera essas informações salvas.
- **🧩 Funções como Expressão e Funções Compostas**: Como funções são criadas e combinadas para formar funções compostas.
- **❓ Operador Ternário**: Usando o operador ternário para decisões condicionais em uma única linha.
- **🗂️ Arrays**: Trabalhando com arrays de diferentes formas sem apelar pra resolução mais rápida.
- **➡️ Fila**: Implementação de uma estrutura de dados FIFO (First In, First Out) para gerenciar elementos com funções para adicionar, remover e consultar itens.

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

<br>

<!-- LEARNED CONCEPTS -->

## 📚 Conceitos Aprendidos:

### 💬 Expressões e Ordem de Precendência

> [!NOTE]\
> Para mais materiais e detalhes, consulte [Precedência de Operadores - Documentação Oficial do PHP](https://www.php.net/manual/pt_BR/language.operators.precedence.php) e o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

#### Introdução
Como o PHP interpreta expressões e como a partir da ordem de precedência o PHP resolve essas expressões. De acordo com a documentação do PHP, expressões são os blocos de construção mais importantes, quase tudo sendo uma expressão que retorna um valor. Esse conhecimento é essencial para entender como o interpretador processa instruções, sendo transferível para outras linguagens com adaptações.

#### Explicação
O PHP avalia expressões seguindo uma tabela de precedência, onde operadores como multiplicação (`*`) e divisão (`/`) têm prioridade sobre adição (`+`) e subtração (`-`). Parênteses alteram essa ordem, sendo resolvidos de dentro para fora.

<br>
<div align="center">

| Ordem | Associação     | Operadores       | Descrição              |
|-------|----------------|------------------|-----------------------|
| 1     | Direita        | **              | Exponenciação          |
| 2     | Esquerda       | * / %           | Multiplicação, Divisão, Módulo |
| 3     | Esquerda       | + -             | Adição, Subtração      |
| 4     | Esquerda       | .               | Concatenação de String |
| 5     | Não associativo | < <= > >=       | Comparação             |
| 6     | Não associativo | == != === !==   | Comparação             |
| 7     | Esquerda       | &&              | E lógico               |
| 8     | Esquerda       | \|\|            | OU lógico              |
| 9     | Direita        | ??              | Null coalescing        |
| 10    | Não associativo | ?:              | Ternário               |
| 11    | Direita        | = += -= *=      | Atribuição             |

</div>

#### Exemplo
Considere a expressão: `2 + 1 == 3 + 0 * 1`
- Passo 1: `0 * 1 = 0` (multiplicação tem precedência)
- Passo 2: `3 + 0 = 3`.
- Passo 3: `2 + 1 = 3`.
- Passo 4: `3 == 3` resulta em `true`.

```php
<?php
$result = 2 + 1 == 3 + 0 * 1;
echo "Resultado: " . ($result ? 'true' : 'false') . "\n"; // Saída: true

$complex = 2 * 2 + ((5 + 2) * (1 + 1));
echo "Expressão complexa: $complex\n"; // Saída: 18
?>
```

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

----

### 🌐 Escopos e Resolução de Expressões

> [!NOTE]\
> Para mais detalhes, consulte o arquivo [functions.php](https://github.com/juletopi/Telecurso2000_PHP/blob/main/functions.php) e o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

#### Introdução
Como o PHP salva informações em escopos diferentes e como a resolução considera essas informações salvas. O escopo é um mapa de variáveis disponíveis durante a execução, sendo alterado por atribuições que definem contextos específicos.

#### Explicação
O escopo pode ser local (dentro de funções) ou global, e a resolução de variáveis depende desse contexto. Atribuições, como `$a = 10`, modificam o escopo, e subexpressões com efeitos colaterais, como `($a = 3)`, definem valores durante a avaliação.

#### Exemplo
Considere a expressão: `$b * ($b = $c + ($c = 2 * 3))`
- Passo 1: `($c = 2 * 3)` define `c = 6`, escopo `{c: 6}`.
- Passo 2: `($b = $c + 6)` define `b = 6 + 6 = 12`, escopo `{c: 6, b: 12}`.
- Passo 3: `$b * 12 = 12 * 12 = 144`.
- Resultado: `144`.

```php
<?php
$globalVar = 10;
function scopeTest() {
    $localVar = 0;
    global $globalVar;
    $result = $localVar + 2 * ($localVar = $globalVar); // $localVar torna-se 10
    echo "Resultado: $result\n"; // Saída: 20
}
scopeTest();
?>
```

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

----

### 🧩 Funções como Expressão e Funções Compostas

> [!NOTE]\
> Para mais detalhes, consulte o arquivo [functions.php](https://github.com/juletopi/Telecurso2000_PHP/blob/main/functions.php) e o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

#### Introdução
Como funções são criadas e combinadas para formar funções compostas. O PHP permite definir funções como expressões, retornando valores que podem ser aplicadas diretamente.

#### Explicação
Funções anônimas por exemplo, usando a sintaxe `fn($a) => $a + 10`, criam closures que capturam o escopo no momento da definição. Por exemplo, `(fn($a) => $a + 10)(5)` resulta em `15`, mostrando a aplicação de argumentos. Funções compostas, como `$impar = fn($a) => !$par($a)`, combinam lógicas existentes, como verificar paridade. O escopo da função permanece independente após a criação.

#### Exemplo
Considere a expressão: `(fn($a, $b) => $a * $b)(5, 3) + (fn($a, $b) => $a + $b)(3, 5)`.
- Esquerda: `{a: 5, b: 3}`, `5 * 3 = 15`.
- Direita: `{a: 3, b: 5}`, `3 + 5 = 8`.
- Topo: `15 + 8 = 23`.

```php
<?php
$par = fn($a) => $a % 2 == 0;
$impar = fn($a) => !$par($a);
echo "É par (6): " . ($par(6) ? 'true' : 'false') . "\n"; // true
echo "É ímpar (5): " . ($impar(5) ? 'true' : 'false') . "\n"; // true
?>
```

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

----

### ❓ Operador Ternário

> [!NOTE]\
> Para mais detalhes, consulte o arquivo [functions.php](https://github.com/juletopi/Telecurso2000_PHP/blob/main/functions.php) e o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

#### Introdução
Usando o operador ternário para decisões condicionais em uma única linha. É um operador que oferece uma forma compacta de expressar escolhas baseadas em condições.

#### Explicação
O operador ternário funciona da seguinte maneira: `condição ? valor_se_verdadeiro : valor_se_falso`. Ele avalia uma condição e retorna um dos dois valores. No PDF, `$a == $b ? "iguais" : "diferentes"` retorna `"iguais"` quando `$a` e `$b` são `5`. Funções como `$max = fn($a, $b) => $a > $b ? $a : $b` utilizam isso para comparar valores, resultando em `7` para `(5, 7)`, como mostrado no Exercício Guiado 2.3.1.

#### Exemplo
Considere `$max(5, 7)`:
- `5 > 7 ? 5 : 7` avalia `false`.
- Retorna `7`.

```php
<?php
$max = fn($a, $b) => $a > $b ? $a : $b;
$ageStatus = fn($a) => $a < 18 ? "menor de idade" : "maior de idade";
echo "Maior valor (5, 7): " . $max(5, 7) . "\n"; // 7
echo "Status idade (16): " . $ageStatus(16) . "\n"; // menor de idade
?>
```

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

----

### 🗂️ Arrays

> [!NOTE]\
> Para mais detalhes, consulte o arquivo [arrays.php](https://github.com/juletopi/Telecurso2000_PHP/blob/main/arrays.php#L100).

#### Introdução
Conjunto de exercícios focando na criação de funções em PHP para manipular arrays, reforçando o uso de estruturas condicionais (`if`) e de repetição (`foreach`, `for`) e exercitando a lógica de programação sem depender de funções nativas do PHP (exceto quando explicitamente necessário, como `array_shift` e `array_unshift`).

#### Índice

- [1. Exibir elementos de um array separados por espaço](#1-exibir-elementos-de-um-array-separados-por-espaço)
- [2. Verificar se um elemento está presente em um array](#2-verificar-se-um-elemento-está-presente-em-um-array)
- [3. Verificar se dois números são sequenciais](#3-verificar-se-dois-números-são-sequenciais)
- [4. Verificar se três números são sequenciais](#4-verificar-se-três-números-são-sequenciais)
- [5. Verificar se um array forma uma sequência](#5-verificar-se-um-array-forma-uma-sequência)
- [6. Retornar o primeiro elemento de um array](#6-retornar-o-primeiro-elemento-de-um-array)
- [7. Retornar o segundo elemento de um array](#7-retornar-o-segundo-elemento-de-um-array)
- [8. Retornar um elemento em uma posição específica](#8-retornar-um-elemento-em-uma-posição-específica)
- [9. Inverter um array](#9-inverter-um-array)
- [10. Retornar um elemento de um array (de trás para frente)](#10-retornar-um-elemento-de-um-array-de-trás-para-frente)
- [11. Calcular o quadrado de um número](#11-calcular-o-quadrado-de-um-número)
- [12. Calcular o quadrado de todos os elementos de um array](#12-calcular-o-quadrado-de-todos-os-elementos-de-um-array)
- [13. Calcular o cubo de um número](#13-calcular-o-cubo-de-um-número)
- [14. Calcular o quadrado ou cubo de um número](#14-calcular-o-quadrado-ou-cubo-de-um-número)
- [15. Calcular qualquer exponencial de um número](#15-calcular-qualquer-exponencial-de-um-número)
- [16. Gerar tabela de exponenciação de 1 a 10](#16-gerar-tabela-de-exponenciação-de-1-a-10)

#### Exercícios

#### 1. Exibir elementos de um array separados por espaço
```php
function exibir_array($array) {
    foreach ($array as $elemento) {
        print $elemento . " ";
    }
}

function exibir_array2($array) {
    $output = implode(" ", $array);
    print rtrim($output);
}

function exibir_array3($array) {
    foreach ($array as $element) {
        if ($array[0] !== $element) {
            print " ";
        }
        print $element;
    }
}

function exibir_array4($array) {
    $key = true;
    foreach ($array as $element) {
        if ($key == false) {
            print " ";
        }
        print $element;
        $key = false;
    }
}

$array = array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5);
print exibir_array4($array);
```

#### 2. Verificar se um elemento está presente em um array
```php
function checagem_membro($array, $membro) {
    foreach ($array as $element) {
        if ($membro == $element) {
            return true;
        }
    }
    return false;
}

var_dump(checagem_membro([1, 2, 3, 4, 5], 1));
```

#### 3. Verificar se dois números são sequenciais
```php
function checagem_seq($seq_1, $seq_2) {
    if ($seq_1 == $seq_2 + 1 || $seq_1 == $seq_2 - 1) {
        return true;
    }
    return false;
}

var_dump(checagem_seq(3, 4));

function checagem_seq_umalinha($seq_1, $seq_2) {
    return ($seq_1 == $seq_2 + 1 || $seq_1 == $seq_2 - 1);
}

var_dump(checagem_seq_umalinha(6, 7));
var_dump(checagem_seq_umalinha(8, 9));
```

#### 4. Verificar se três números são sequenciais
```php
function checagem_seq_3($seq_1, $seq_2, $seq_3) {
    return ($seq_1 == $seq_2 + 1 && $seq_2 == $seq_3 + 1) || ($seq_1 == $seq_2 - 1 && $seq_2 == $seq_3 - 1);
}

var_dump(checagem_seq_3(5, 6, 7));
var_dump(checagem_seq_3(8, 9, 10));

function checagem_seq_3_reaproveitada($seq_1, $seq_2, $seq_3) {
    if (checagem_seq($seq_1, $seq_2) && checagem_seq($seq_2, $seq_3)) {
        return true;
    }
    return false;
}

var_dump(checagem_seq_3_reaproveitada(5, 6, 7));
var_dump(checagem_seq_3_reaproveitada(8, 9, 10));
```

#### 5. Verificar se um array forma uma sequência
```php
function checagem_seq_array($array) {
    $anterior = array_shift($array);

    foreach ($array as $next) {
        if (!checagem_seq_umalinha($anterior, $next)) {
            return false;
        }
        $anterior = $next;
    }
    return true;
}

var_dump(checagem_seq_array([1, 2, 3, 4, 5]));
var_dump(checagem_seq_array([5, 6, 7, 8, 9]));
```

#### 6. Retornar o primeiro elemento de um array
```php
function primeiro_elemento($array) {
    return array_shift($array);
}

var_dump(primeiro_elemento(['a', 'b', 3, 5, 'd', 6, 7]));
var_dump(primeiro_elemento([7, 2, 3, 5, 9, 6, 1]));
```

#### 7. Retornar o segundo elemento de um array
```php
function segundo_elemento($array) {
    $primeiro = array_shift($array);

    foreach ($array as $next) {
        return $next;
    }
}

var_dump(segundo_elemento(['a', 'j', 3, 5, 'd', 6, 7]));
var_dump(segundo_elemento([7, 17, 3, 5, 9, 6, 1]));
```

#### 8. Retornar um elemento em uma posição específica
```php
function posicao_elemento($array, $posicao) {
    $anterior = array_shift($array);

    foreach ($array as $next) {
        if ($posicao == 1) {
            return $anterior;
        }
        $posicao--;
        $anterior = $next;
    }
}

var_dump(posicao_elemento(['a', 'j', 3, 5, 'd', 6, 7], 5));
var_dump(posicao_elemento([7, 17, 3, 5, 9, 6, 1], 6));
```

#### 9. Inverter um array
```php
function inverter_array($array) {
    $invertido = [];

    foreach ($array as $next) {
        array_unshift($invertido, $next);
    }
    return $invertido;
}

var_dump(inverter_array(['a', 'b', 'c', 'd', 'e', 'f', 'g']));
var_dump(inverter_array([10, 20, 30, 40, 50, 60, 70]));
```

#### 10. Retornar um elemento de um array (de trás para frente)
```php
function posicao_elemento_invertido($array, $posicao) {
    $invertido = inverter_array($array);
    return posicao_elemento($invertido, $posicao);
}

var_dump(posicao_elemento_invertido(['a', 'j', 3, 5, 'd', 6, 7], 3));
var_dump(posicao_elemento_invertido([7, 17, 14, 69, 56, 99, 21], 1));
```

#### 11. Calcular o quadrado de um número
```php
function calc_quadrado($num) {
    return $num * $num;
}

var_dump(calc_quadrado(5));
```

#### 12. Calcular o quadrado de todos os elementos de um array
```php
function calc_quadrado_array($array) {
    foreach ($array as $num => $value) {
        $array[$num] = calc_quadrado($value);
    }
    return $array;
}

var_dump(calc_quadrado_array([1, 2, 3]));
```

#### 13. Calcular o cubo de um número
```php
function calc_cubo($num) {
    return calc_quadrado(($num)) * $num;
}

var_dump(calc_cubo(5));
```

#### 14. Calcular o quadrado ou cubo de um número
```php
function calc_cubo_ou_quadrado($num, $i) {
    return $i == 2 ? calc_quadrado($num) : calc_cubo($num);
}

var_dump(calc_cubo_ou_quadrado(3, 3));
var_dump(calc_cubo_ou_quadrado(5, 2));
```

#### 15. Calcular qualquer exponencial de um número
```php
function exponenciar($num, $i) {
    $resultado = $num;
    for ($j = 1; $j < $i; $j++) {
        $resultado *= $num;
    }
    return $resultado;
}

var_dump(exponenciar(5, 3));
```

#### 16. Gerar tabela de exponenciação de 1 a 10
```php
function tabela_exponenciacao($num) {
    $tabela = [];
    for ($i = 1; $i <= 10; $i++) {
        $tabela[] = exponenciar($num, $i);
    }
    return $tabela;
}

var_dump(tabela_exponenciacao(5));
var_dump(tabela_exponenciacao(10));
```

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

----

### ➡️ Filas

> [!NOTE]\
> Para mais detalhes, consulte o arquivo [queues.php](https://github.com/juletopi/Telecurso2000_PHP/blob/main/queues.php), o diretório [gestaoEventos](https://github.com/juletopi/Telecurso2000_PHP/tree/main/gestaoEventos) e o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

#### Introdução
Uma **fila** é uma estrutura de dados que segue o princípio **FIFO** (First In, First Out), ou seja, o primeiro elemento a entrar na fila é o primeiro a ser removido. Em PHP, a implementação de filas pode ser feita utilizando arrays, com funções específicas para gerenciar a adição, remoção e consulta de elementos.

Este tópico apresenta uma implementação de fila em PHP com os arquivos `fila.php`, `evento.php` e `atendimento.php`.

#### Explicação

A implementação da fila está contida no arquivo `fila.php`, que define as seguintes funções:

- **`fila()`**: Cria uma nova fila.
- **`filaAdd(&$fila, $el)`**: Adiciona um elemento ao final da fila.
- **`filaTake(&$fila)`**: Remove e retorna o elemento do início da fila. Retorna `null` se a fila estiver vazia.
- **`filaPeek($fila)`**: Retorna o elemento do início da fila sem removê-lo. Retorna `null` se a fila estiver vazia.
- **`filaSize($fila)`**: Retorna o número de elementos na fila.
- **`filaFull($fila)`**: Verifica se a fila está cheia.
- **`filaEmpty($fila)`**: Verifica se a fila está vazia.
- **`filaClear(&$fila)`**: Remove todos os elementos da fila.

#### Exemplo 1: Simulação de um Evento (`evento.php`)

O arquivo `evento.php` demonstra o uso básico da fila para gerenciar a chegada e o atendimento de pessoas em um evento:

1. Uma fila é criada com `fila()`.
2. Pessoas são adicionadas à fila com `filaAdd()`.
3. O tamanho da fila é consultado com `filaSize()`.
4. A primeira pessoa na fila é consultada com `filaPeek()`.
5. Pessoas são atendidas (removidas) com `filaTake()`.
6. A fila é limpa com `filaClear()` ao final do evento.

Exemplo de saída ao executar `evento.php`:

```
Pessoas estão chegando ao evento...
Tamanho da fila: 4 pessoas
Primeira pessoa na fila: Ana

Atendendo pessoas...
Pessoa atendida: Ana
Pessoa atendida: Bruno

Tamanho da fila agora: 2 pessoas
Primeira pessoa na fila: Clara

Evento encerrado, limpando a fila...
A fila está vazia!
```

##### Exemplo 2: Sistema de Atendimento Interativo (`atendimento.php`)

O arquivo `atendimento.php` implementa um sistema interativo de gerenciamento de filas, onde o usuário pode:

1. Gerar uma senha (adicionar uma pessoa à fila).
2. Atender a próxima pessoa (remover da fila).
3. Consultar o tamanho da fila.
4. Verificar a próxima pessoa na fila.
5. Sair do sistema, limpando a fila.

Exemplo de interação com `atendimento.php`:

```
=== Sistema de Atendimento ===
1. Gerar senha (adicionar pessoa à fila)
2. Atender (chamar próxima pessoa)
3. Ver tamanho da fila
4. Ver próxima pessoa na fila
5. Sair
Escolha uma opção: 1
Digite o nome da pessoa: Maria
Senha gerada! Maria foi adicionado(a) à fila.

=== Sistema de Atendimento ===
...
Escolha uma opção: 2
Pessoa atendida: Maria

=== Sistema de Atendimento ===
...
Escolha uma opção: 5
Encerrando o sistema e limpando a fila...
Sistema finalizado. A fila está vazia!
```

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

<br>

<!-- AUTHOR -->

## 👤 Autor

<table>
  <tr>
    <td valign="middle" width="25%">
      <div align="center">  
        <a href="https://github.com/juletopi" title="Perfil no GitHub" aria-label="GitHub - Juletopi">
          <img src="https://user-images.githubusercontent.com/76459155/220271784-9f930c36-c370-4518-9b56-604627c6e2b5.png" width="150" alt="Profile Pic - Juletopi"/>
          <br>
          <sub><strong>Júlio Cézar | Juletopi</strong></sub>
          <br>
        </a>
      </div>
    </td>
    <td valign="middle" width="75%">
      <ul style="list-style: none; padding-left: 0; margin: 0;">
        <li>
          <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" width="15" alt="LinkedIn" style="vertical-align:middle;">
          LinkedIn — 
          <a href="https://www.linkedin.com/in/julio-cezar-pereira-camargo/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn - Júlio Cézar P. Camargo">
            Júlio Cézar P. Camargo
          </a>
        </li>
        <li>
          <img src="https://pngimg.com/uploads/email/email_PNG100738.png" width="15" alt="Email" style="vertical-align:middle;">
          Email — 
          <a href="mailto:juliocezarpvh@hotmail.com" aria-label="Send email - juliocezarpvh@hotmail.com">
            juliocezarpvh@hotmail.com
          </a>
        </li>
        <li>
          <img src="https://cdn3.emoji.gg/emojis/2116-facebook.png" width="15" alt="Facebook" style="vertical-align:middle;">
          Facebook — 
          <a href="https://www.facebook.com/juhletopi" target="_blank" rel="noopener noreferrer" aria-label="Facebook - Juhletopi">
            facebook.com/juhletopi
          </a>
        </li>
        <li>
          <img src="https://cdn3.emoji.gg/emojis/6333-instagram.png" width="15" alt="Instagram" style="vertical-align:middle;">
          Instagram — 
          <a href="https://www.instagram.com/juletopi/" target="_blank" rel="noopener noreferrer" aria-label="Instagram - Juletopi">
            @juletopi
          </a>
        </li>
      </ul>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <img src="https://juletopi.github.io/JCPC_Portfolio/src/images/initialsLogo.png" width="25" alt="Portfolio" align="center"/>
      Portfolio —
      <a href="https://juletopi.github.io/JCPC_Portfolio/" target="_blank" rel="noopener noreferrer" aria-label="Portfolio - Juletopi">
        juletopi.github.io/JCPC_Portfolio
      </a>
    </td>
  </tr>
</table>

<div align="left">
  <h6><a href="#telecurso-2000-php"> Voltar para o início ↺</a></h6>
</div>

<br>

<!-- THANK YOU, GOODBYE -->

----

<div align="center">
  Feito com ❤️ e ☕ por <a href="https://github.com/juletopi"> Juletopi</a>.
</div>
