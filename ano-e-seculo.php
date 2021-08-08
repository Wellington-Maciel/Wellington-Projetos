<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
function calcularSeculo($_num){

$_ano = date(1750);

 return $_ano/$_num;
}
echo 'ANO' . '/' . 'SÉCULO'. "</br>";
echo "</br>"."1750". '=' .floor(calcularSeculo(100))."</br>";
?> 
</br>
<?php 

function calcularSeculo1($_num1){

    $_ano1 = date(1525);
    
     return $_ano1/$_num1;
    }
    echo 'ANO' . '/' . 'SÉCULO'. "</br>";
    echo "</br>"."1525". '=' .floor(calcularSeculo1(100));

?>
</br>
</br>
<?php 

function calcularSeculo2($_num2){

    $_ano2 = date(1301);
    
     return $_ano2/$_num2;
    }
    echo 'ANO' . '/' . 'SÉCULO'. "</br>";
    echo "</br>"."1301". '=' .floor(calcularSeculo2(100));

?>
</body>
</html>


