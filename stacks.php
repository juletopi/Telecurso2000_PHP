<?php

// 1. Crie uma função que inicialize uma estrutura de pilha como um array vazio.

function pilha() {
    return [];
}

var_dump(pilha());

// 2. Crie uma função que adicione um elemento ao topo da pilha.

function pilha_push(&$p, $e) {
    $p[] = $e;
    return $p;
}

$p = pilha();
var_dump(pilha_push($p, "Amanda"));
var_dump(pilha_push($p, "Filipe"));
var_dump(pilha_push($p, "Fernando"));

// 3. Crie uma função que retorne o tamanho da pilha.

function pilha_size($p) {
    return count($p);
}

var_dump(pilha_size($p));

// 4. Crie uma função que retorne o elemento do topo da pilha, sem removê-lo.

function pilha_peek($p) {
    if (pilha_empty($p)) {
        return null;
    }
    return $p[count($p) - 1]; // Último elemento (topo da pilha)
}

var_dump(pilha_peek($p));

// 5. Crie uma função que remova e retorne um elemento do topo da pilha.

function pilha_pop(&$p) {
    if (pilha_empty($p)) {
        return null;
    }
    return array_pop($p); // Remove do final (topo da pilha)
}

var_dump(pilha_pop($p));
var_dump(pilha_pop($p));
var_dump(pilha_pop($p));

// 6. Crie uma função que verifique se a pilha está vazia.

function pilha_empty($p) {
    return count($p) == 0;
}

var_dump(pilha_empty($p));

// 7. Crie uma função que limpe a pilha.

function pilha_clear(&$p) {
    $p = [];
}

var_dump(pilha_clear($p));
