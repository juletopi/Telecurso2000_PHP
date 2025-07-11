<?php

// 1. Crie uma função que inicialize uma estrutura de fila como um array vazio.

function fila() {
    return [];
}

var_dump(fila());

// 2. Crie uma função que adicione um elemento ao final da fila.

function fila_add(&$q, $e) {
    $q[] = $e;
    return $q;
}

$q = fila();
var_dump(fila_add($q, "Amanda"));
var_dump(fila_add($q, "Filipe"));
var_dump(fila_add($q, "Fernando"));

// 3. Crie uma função que retorne o tamanho da fila.

function fila_size($q) {
    return count($q);
}

var_dump(fila_size($q));

// 4. Crie uma função que retorne o primeiro elemento da fila, sem remove-lo.

function fila_peek($q) {
    return $q[0];
}

var_dump(fila_peek($q));

// 5. Crie uma função que remova e retorne um elemento do começo da fila.

function fila_take(&$q) {
    $e = array_shift($q);
    return $e;
}

var_dump(fila_take($q));
var_dump(fila_take($q));
var_dump(fila_take($q));

// 6. Crie uma função que verifique se a fila está vazia.

function fila_empty($q) {
    return count($q) == 0;
}

var_dump(fila_empty($q));

// 7. Crie uma função que limpe a fila.

function fila_clear(&$q) {
    $q = [];
}

var_dump(fila_clear($q));
