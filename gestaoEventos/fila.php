<?php
// Desafio: Alterar a implementação sem quebrar a interface

// O intuito é modificar o comportamento do Sistema de Atendimento sem modificar a interface do mesmo, ou seja,
// o usuário não terá que se preocupar com nenhuma mudança na interface, só perceberá que o comportamento mudou.

// Cria uma fila
function fila($max = 5) {
    return [$max];
}

// Adiciona um elemento ao final da fila
function filaAdd(&$fila, $el) {
    $fila[] = $el;
    return true;
}

// Remove e retorna um elemento do começo da fila
// (Caso a fila esteja vazia, retorna null)
function filaTake(&$fila) {
    if (filaEmpty($fila)) {
        return null;
    } else {
        $el = array_shift($fila);
        return $el;
    }
}

// Retorna um elemento do começo da fila sem remove-lo
// (Caso a fila esteja vazia, retorna null)
function filaPeek($fila) {
    if (filaEmpty($fila)) {
        return null;
    } else {
        return $fila[0];
    }
}

// Retorna o tamanho da fila
function filaSize($fila) {
    return count($fila) - 1;
}

// Verifica se a fila está cheia
function filaFull($fila) {
    return filaSize($fila) == $fila[0];
}

// Verifica se a fila está vazia
function filaEmpty($fila) {
    return filaSize($fila) == 0;
}

// Limpa a fila
function filaClear(&$fila) {
    $fila = [];
}
