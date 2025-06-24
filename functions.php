<?php
// Ordem de Precendência e Escopos

$a = 0;
$result = $a + 2 * ($a = 3);
echo "Resolução: $result\n";
// $a torna-se 3, pois a expressão dentro dos parenteses foi executada primeiro pela ordem de precedência

$a1 = 5;
function test() {
    global $a1;
    $a1 * 5 - ($a1 = 10);
    return $a1;
}

echo "Escopos: " . test() . "\n";
// $a1 torna-se 10,por conta da ordem de precedência e com o global, $a1 pode ser acessado fora da função.
// Os parenteses também podem ser usados para alterar o escopo de uma variável.


// Funções como Expressão

$somar = fn($a, $b) => $a + $b;
echo "Funções como Expressão: " . $somar(2, 3) . "\n";
// fn significa function anonymous e pode ser usada para criar funções sem nome. 
// Ao atribuir uma função a uma variável, ela torna-se uma expressão.


// Funções Compostas

$par = fn($a) => $a % 2 == 0;
$impar = fn($a) => $par($a + 1); // <-- Função composta
$num = 5;
echo "$num é ímpar? " . ($impar($num) ? 'sim' : 'não') . "\n";
// Funções compostas são funções que usam outras funções como argumentos.


// Operador Ternário

$num = 2;
echo "Operador Ternário: " . ($num % 2 == 0 ? 'par' : 'ímpar') . "\n";
// O operador ternário pode ser usado para criar expressões condicionais em uma linha, sem o uso de if's.
