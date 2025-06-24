<!-- PRESENTATION -->

<div align="center">
    <img src="https://github.com/user-attachments/assets/5f6ab906-1cb9-4c3a-959a-94a94b2cda8e" alt="Telecurso2000-pic" width="500px" title="TELECURSO 2000 PHP">
    <h2 align="center">TELECURSO 2000 PHP</h2>
</div>

<div align="center">

  • Repositório de aprendizados 'especiais' sobre PHP, promovido por Evandro Murilo.

<br>
</div>

<!-- ABOUT -->

## ❓ "Telecurso 2000 PHP?"  

É um nome divertido que acabei pensando para o conjunto de aprendizados contínuos promovidos por [**Evandro Murilo**](https://github.com/evandromurilo), através de vários exercícios guiados para alguns colaboradores (incluido eu), com foco em praticar conceitos de PHP de forma incremental. O intuito foi aprender conceitos de lógica de programação e a forma interpretação e execução do PHP.

### 📋 Listagem de tópicos

- **💬 Expressões e Ordem de Precendência**: Como o PHP interpreta expressões e como a partir da ordem de precedência o PHP resolve essas expressões.
- **🌐 Escopos e Resolução de Expressões**: Como o PHP salva informações em escopos diferentes e como a resolução considera essas informações salvas.
- **🧩 Funções como Expressão e Funções Compostas**: Como funções são criadas e combinadas para formar funções compostas.
- **❓ Operador Ternário**: Usando o operador ternário para decisões condicionais em uma única linha.
- **🗂️ Arrays**: Trabalhando com arrays de diferentes formas sem apelar pra resolução mais rápida.

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
> Para mais detalhes, consulte o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

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
> Para mais detalhes, consulte o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

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
> Para mais detalhes, consulte o guia em PDF [master.pdf](https://github.com/juletopi/Telecurso2000_PHP/blob/main/master.pdf).

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

<br>

<!-- AUTHOR -->

## 👤 Autor

<table>
  <tr>
    <td valign="top" width="33%">
      <div align="center">  
        <a href="https://github.com/juletopi">
          <img src="https://user-images.githubusercontent.com/76459155/220271784-9f930c36-c370-4518-9b56-604627c6e2b5.png" width="120px;" alt="JuletopiAvatar-pic" title="Autor: Juletopi" />
          <br>
          <sub><b>Júlio Cézar | Juletopi</b></sub>
        </a>
      </div>
    </td>
    <td valign="left" width="100%">
      <div align="left">
        <ul>
          <li>
            <sub><img align="center" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" height="15" alt="LinkedIn-icon"> LinkedIn - <a href="https://www.linkedin.com/in/julio-cezar-pereira-camargo/">Júlio Cézar P. Camargo</a></sub>
          </li>
          <li>
            <sub><img align="center" src="https://pngimg.com/uploads/email/email_PNG100738.png" height="15" alt="Facebook-icon"> Email - <a href="mailto:juliocezarpvh@hotmail.com">juliocezarpvh@hotmail.com</a></sub>
          </li>
          <li>
            <sub><img align="center" src="https://cdn3.emoji.gg/emojis/6158-whatsapp.png" height="15" alt="WhatsApp-icon"> Whatsapp - <a href="http://api.whatsapp.com/send?phone=5569993606894">+55 (69) 9 9360-6894</a></sub>
          </li>
          <li>
            <sub><img align="center" src="https://cdn3.emoji.gg/emojis/6333-instagram.png" height="15" alt="Instagram-icon"> Instagram - <a href="https://www.instagram.com/juletopi/">@juletopi</a></sub>
          </li>
        </ul>
      </div>
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
