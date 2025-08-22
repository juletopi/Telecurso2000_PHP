<?php

// Cria uma pilha
function pilha() {
    return [];
}

// Adiciona um elemento ao topo da pilha
function pilhaPush(&$pilha, $el) {
    $pilha[] = $el;
    return true;
}

// Remove e retorna um elemento do topo da pilha
// (Caso a pilha esteja vazia, retorna null)
function pilhaPop(&$pilha) {
    if (pilhaEmpty($pilha)) {
        return null;
    } else {
        return array_pop($pilha);
    }
}

// Retorna um elemento do topo da pilha sem remove-lo
// (Caso a pilha esteja vazia, retorna null)
function pilhaPeek($pilha) {
    if (pilhaEmpty($pilha)) {
        return null;
    } else {
        return $pilha[count($pilha) - 1];
    }
}

// Retorna o tamanho da pilha
function pilhaSize($pilha) {
    return count($pilha);
}

// Verifica se a pilha está vazia
function pilhaEmpty($pilha) {
    return count($pilha) == 0;
}

// Limpa a pilha
function pilhaClear(&$pilha) {
    $pilha = [];
}

// Retorna todos os elementos da pilha como string (para debug)
function pilhaToString($pilha) {
    return "[" . implode(", ", $pilha) . "]";
}
