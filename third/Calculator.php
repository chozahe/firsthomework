<?php


class Calculator
{
    function sum(float $a, float $b): float
    {
       return $a + $b;
    }

    function min(float $a, float $b): float
    {
       return $a - $b;
    }

    function div(float $a, float $b): float
    {
       return $a / $b;
    }

    function multiply(float $a, float $b): float
    {
       return $a * $b;
    }

    function isPrime(int $a): bool
    {
        if($a<2){
            return false;
        }
        for($i=2; $i<sqrt($a); $i++){
            if($a%$i === 0){
                return false;
            }
        }
        return true;
    }
}