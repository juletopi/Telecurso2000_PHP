<?php

include "fila.php";

// Script de exemplo: Fila de pessoas para um evento
$filaEvento = fila(); // Cria uma nova fila

// Adiciona nomes à fila
echo "Pessoas estão chegando ao evento...\n";
filaAdd($filaEvento, "Ana");
filaAdd($filaEvento, "Bruno");
filaAdd($filaEvento, "Clara");
filaAdd($filaEvento, "Diego");

echo "Tamanho da fila: " . filaSize($filaEvento) . " pessoas\n";
echo "Primeira pessoa na fila: " . filaPeek($filaEvento) . "\n";

// Atende algumas pessoas
echo "\nAtendendo pessoas...\n";
$atendido = filaTake($filaEvento);
echo "Pessoa atendida: $atendido\n";
$atendido = filaTake($filaEvento);
echo "Pessoa atendida: $atendido\n";

echo "\nTamanho da fila agora: " . filaSize($filaEvento) . " pessoas\n";
echo "Primeira pessoa na fila: " . filaPeek($filaEvento) . "\n";

// Limpa a fila
echo "\nEvento encerrado, limpando a fila...\n";
filaClear($filaEvento);

if (filaEmpty($filaEvento)) {
    echo "A fila está vazia!\n";
}
