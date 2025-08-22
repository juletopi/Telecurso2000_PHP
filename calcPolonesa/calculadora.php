<?php

require_once 'pilha.php';

$buffer = [];
$pilha = pilha();

function get() {
    global $buffer;

    if (empty($buffer)) {
        $buffer = explode(" ", readline());
    }

    return array_shift($buffer);
}

while (true) {
    $el = get();

    if (is_numeric($el)) {
        pilhaPush($pilha, $el);
    } else if ($el == "+") {
        $b = pilhaPop($pilha);
        $a = pilhaPop($pilha);
        if ($a !== null && $b !== null) {
            pilhaPush($pilha, $a + $b);
        } else {
            print "Erro: Operandos insuficientes para a operação +\n";
            exit(1);
        }
    } else if ($el == "x") {
        $b = pilhaPop($pilha);
        $a = pilhaPop($pilha);
        if ($a !== null && $b !== null) {
            pilhaPush($pilha, $a * $b);
        } else {
            print "Erro: Operandos insuficientes para a operação x\n";
            exit(1);
        }
    } else if ($el == "-") {
        $b = pilhaPop($pilha);
        $a = pilhaPop($pilha);
        if ($a !== null && $b !== null) {
            pilhaPush($pilha, $a - $b);
        } else {
            print "Erro: Operandos insuficientes para a operação -\n";
            exit(1);
        }
    } else if ($el == "/") {
        $b = pilhaPop($pilha);
        $a = pilhaPop($pilha);
        if ($a !== null && $b !== null) {
            if ($b != 0) {
                pilhaPush($pilha, $a / $b);
            } else {
                print "Erro: Divisão por zero\n";
                exit(1);
            }
        } else {
            print "Erro: Operandos insuficientes para a operação /\n";
            exit(1);
        }
    } else if ($el == "dup") {
        $el = pilhaPop($pilha);
        if ($el !== null) {
            pilhaPush($pilha, $el);
            pilhaPush($pilha, $el);
        } else {
            print "Erro: Pilha vazia - não é possível duplicar\n";
        }
    } else if ($el == "show") {
        $resultado = pilhaPeek($pilha);
        if ($resultado !== null) {
            print "Resultado atual: " . $resultado . "\n";
        } else {
            print "Erro: Pilha vazia - nenhum resultado disponível\n";
        }
        print "Pressione Enter para continuar ou digite 'sair' ";
        $input = trim(readline());
        if ($input == "exit") {
            break;
        }
    } else if ($el == "exit") {
        break;
    } else {
        print "Erro: Operador desconhecido '$el'\n";
        exit(1);
    }
}

if (pilhaSize($pilha) == 1) {
    print "Resultado: " . pilhaPeek($pilha) . "\n";
} else if (pilhaEmpty($pilha)) {
    print "Erro: Nenhum resultado na pilha\n";
    exit(1);
} else {
    print "Erro: Expressão inválida. Restaram " . pilhaSize($pilha) . " elementos na pilha\n";
    exit(1);
}
