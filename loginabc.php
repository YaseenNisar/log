<?php

$variable = 'I am value of variable';
echo $variable;

$numeric = 11111;
echo "<br>$numeric";
$numeric = 'stirng';
echo "<br>$numeric";

$arr = array();


$arr[] = "abd";
$arr[] = "abd";
$arr[] = "abd";
$arr[] = "abd";
$arr[12] = 'any thing';
$arr[] = "abd";
$arr['anyKey'] = 777777;

// echo '<br>'.$arr; 

print_r($arr['anyKey']);




?>