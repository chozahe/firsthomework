<?php
declare(strict_types=1);
class FileProcessor
{
    public array $lines;
    public function __construct(string $filename){
        $numbers = file($filename);
        foreach ($numbers as $number){
            if(!is_numeric(trim($number))){
                throw new \Exception("Invalid number");
            }else{
                $this->lines[] = (float) trim($number);
            }
        }
    }

    public function sumAll(): float
    {
        $sum = 0;
        foreach ($this->lines as $line){
            $sum += $line;
        }
        return $sum;
    }

    public function minimal(): float
    {
        $minimal = INF;
        foreach ($this->lines as $line){
            if($line < $minimal){
                $minimal = $line;
            }
        }
        return $minimal;
    }

    public function maximal(): float
    {
        $maximal = -INF;
        foreach ($this->lines as $line){
            if($line > $maximal){
                $maximal = $line;
            }
        }
        return $maximal;
    }

    public function evens(): array
    {
        $evens = [];
        foreach ($this->lines as $line){
            if($line % 2 === 0){
                $evens[] = $line;
            }
        }
        return $evens;
    }
}