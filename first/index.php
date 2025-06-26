<?php

echo "привет друг!" . PHP_EOL;
$flag = false;
$name = "";
while(!$flag){
    $name = trim(readline("твое имя: " ));
    if(!is_numeric($name) && $name != ""){
        $flag = true;
    }else{
        echo "имя не может быть числом или пустым алеее" . PHP_EOL;
    }
}

$age = 0;
$newflag = false;
while(!$newflag){
    $age = readline("Ваш возраст: ");
    if(is_numeric($age)){
        $newflag = true;
    }else{
        echo"возраст это цифра" . PHP_EOL;
    }
}
if($age > 18){
    echo("Привет, совершеннолетний " . $name);
}else{
    echo("Привет, малышарик " . $name);
}

