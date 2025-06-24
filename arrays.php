<?php
// Modelo
function nome_funcao($parametro1, $parametro2) {
    // Código da função
    return $parametro1 + $parametro2;
}
// Chamada
$resultado = nome_funcao(7, 3);
var_dump($resultado);

// 1. Crie uma função que exiba todos os elementos de um array, separados por um espaço

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
print exibir_array4($array) . "\n";

// 2. Crie uma função que receba uma array e um elemento e retorne true se o elemento 
// estiver presente no array e false caso contrário (Use foreach)

function checagem_membro($array, $membro) {
    foreach ($array as $element) {
        if ($membro == $element) {
            return true;
        }
    }
    return false;
}

var_dump(checagem_membro([1, 2, 3, 4, 5], 1));

// 3. Crie uma função que receba dois argumentos e retorne true se o segundo for sequência do primeiro e false caso contrário

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

// 4. Faça o mesmo do exercício anterior, mas com 3 parâmetros

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

// 5. Crie uma função que cheque se todos os elementos de um array formam uma sequência (Utilize uma função composta)

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

// 6. Crie uma função que retorne o primeiro elemento de um array

function primeiro_elemento($array) {
    return array_shift($array);
}

var_dump(primeiro_elemento(['a', 'b', 3, 5, 'd', 6, 7]));
var_dump(primeiro_elemento([7, 2, 3, 5, 9, 6, 1]));

// 7. Crie uma função que retorne o segundo elemento de uma array

function segundo_elemento($array) {
    $primeiro = array_shift($array);

    foreach ($array as $next) {
        return $next;
    }
}

var_dump(segundo_elemento(['a', 'j', 3, 5, 'd', 6, 7]));
var_dump(segundo_elemento([7, 17, 3, 5, 9, 6, 1]));

// 8. Crie uma função que retorne determinado elemento de uma array, ou seja, 
// a função recebe um array e a posição do elemento a ser retornado

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

// 9. Crie uma função que inverta um array

function inverter_array($array) {
    $invertido = [];

    foreach ($array as $next) {
        array_unshift($invertido, $next);
    }
    return $invertido;
}

var_dump(inverter_array(['a', 'b', 'c', 'd', 'e', 'f', 'g']));
var_dump(inverter_array([10, 20, 30, 40, 50, 60, 70]));

// 10. Tarefa de casa: Crie uma função que retorne determinado elemento de um array, mas de trás pra frente. 
// Por exemplo, 1 deve retornar o último elemento; 2 deve retornar o penúltimo, e assim por diante.

function posicao_elemento_invertido($array, $posicao) {
    $invertido = inverter_array($array);
    return posicao_elemento($invertido, $posicao);
}

var_dump(posicao_elemento_invertido(['a', 'j', 3, 5, 'd', 6, 7], 3));
var_dump(posicao_elemento_invertido([7, 17, 14, 69, 56, 99, 21], 1));

// 11. Crie uma função para calcular o quadrado de um número (Um número vezes ele mesmo)

function calc_quadrado($num) {
    return $num * $num;
}

var_dump(calc_quadrado(5));

// 12. Crie uma função para calcular o quadrado de todos os números de um array. (ex.: minhaFn([1, 2, 3]); deve retornar [1, 4, 9])

function calc_quadrado_array($array) {
    foreach ($array as $num => $value) {
        $array[$num] = calc_quadrado($value);
    }
    return $array;
}

var_dump(calc_quadrado_array([1, 2, 3]));

// 13. Crie uma função para calcular o cubo de um número qualquer. O cubo de 3, por exemplo, é 3 x 3 x 3 = 27. Utilize a função anterior.

function calc_cubo($num) {
    return calc_quadrado(($num)) * $num;
}

var_dump(calc_cubo(5));

// 14. Crie uma função que calcule o cubo ou o quadrado de um número, dependendo se o segundo argumento for 2 (quadrado) ou 3 (cubo).
// (ex.: minhaFuncao(2, 3); o cubo de 2 ou minhaFuncao(5, 2); o quadrado de 5)

function calc_cubo_ou_quadrado($num, $i) {
    return $i == 2 ? calc_quadrado($num) : calc_cubo($num);
}

var_dump(calc_cubo_ou_quadrado(3, 3));
var_dump(calc_cubo_ou_quadrado(5, 2));
    
// 15. Crie uma função para calcular qualquer exponencial de um número, seja o quadrado, o cubo, ou outros exponenciais.
// (ex.: exponenciar(2, 4);  2 x 2 x 2 x 2 = 16)

function exponenciar($num, $i) {
    $resultado = $num;
    for ($j = 1; $j < $i; $j++) {
        $resultado *= $num;
    }
    return $resultado;
}

var_dump(exponenciar(5, 3));

// 16. Crie uma função para gerar uma tabela de exponenciação de 1 a 10 para qualquer expoente. 
// (ex.: minhaFn(2); [2, 4, 8, 16...] ou minhaFn(3); [3, 9, 81...])

function tabela_exponenciacao($num) {
    $tabela = [];
    for ($i = 1; $i <= 10; $i++) {
        $tabela[] = exponenciar($num, $i);
    }
    return $tabela;
}

var_dump(tabela_exponenciacao(5));
var_dump(tabela_exponenciacao(10));
