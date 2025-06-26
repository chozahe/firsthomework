<?php
require_once("Calculator.php");

$input = readline("Введите ваше выражение или число для проверки простоты: ");
$input = str_replace(" ", "", $input);
$calc = new Calculator();
if (preg_match('/^([\-]?\d+\.?\d*)([\+\-\*\/])([\-]?\d+\.?\d*)$/', $input, $matches)) {
    $num1 = (float)$matches[1];
    $operator = $matches[2];
    $num2 = (float)$matches[3];
    $result = 0;

    switch ($operator) {
        case '+': $result = $calc->sum($num1, $num2); break;
        case '-': $result = $calc->min($num1, $num2); break;
        case '*': $result = $calc->multiply($num1, $num2); break;
        case '/':
            if ($num2 == 0) die("Ошибка: деление на ноль");
            $result = $calc->div($num1, $num2);
            break;
    }
    echo $result;
}elseif (preg_match('/^\d+$/', $input)){
    $num = (int)$input;
    echo $calc->isPrime($num) ? "простое" : "непростое";
}else{
    die("Неправильно что то написали!!!");
}