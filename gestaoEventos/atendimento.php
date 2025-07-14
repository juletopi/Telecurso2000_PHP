<?php

include "fila.php";

$filaEvento = fila(5);

while (true) {
    echo "\n=== Sistema de Atendimento ===\n";
    echo "1. Gerar senha (adicionar pessoa à fila)\n";
    echo "2. Atender (chamar próxima pessoa)\n";
    echo "3. Ver tamanho da fila\n";
    echo "4. Ver próxima pessoa na fila\n";
    echo "5. Sair\n";
    echo "Escolha uma opção: ";

    $opcao = trim(fgets(STDIN));

    switch ($opcao) {
        case '1':
            echo "Digite o nome da pessoa: ";
            $nome = trim(fgets(STDIN));
            if (!empty($nome)) {
                filaAdd($filaEvento, $nome);
                echo "Senha gerada! $nome foi adicionado(a) à fila.\n";
            } else {
                echo "Nome inválido! Tente novamente.\n";
            }
            break;

        case '2':
            if (filaEmpty($filaEvento)) {
                echo "A fila está vazia! Ninguém para atender.\n";
            } else {
                $atendido = filaTake($filaEvento);
                echo "Pessoa atendida: $atendido\n";
            }
            break;

        case '3':
            echo "Tamanho da fila: " . filaSize($filaEvento) . " pessoas\n";
            break;

        case '4':
            $primeiro = filaPeek($filaEvento);
            if ($primeiro === null) {
                echo "A fila está vazia!\n";
            } else {
                echo "Primeira pessoa na fila: $primeiro\n";
            }
            break;

        case '5':
            echo "\nEncerrando o sistema e limpando a fila...\n";
            filaClear($filaEvento);
            echo "Sistema finalizado. A fila está vazia!\n";
            exit;

        default:
            echo "Opção inválida! Escolha novamente.\n";
    }
}
