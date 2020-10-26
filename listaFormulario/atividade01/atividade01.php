<?php
    /*Crie um programa em PHP para retornar dentre 3 números inteiros, qual
    desses é o maior e qual desses é o menor. Suponha que os três números
    são diferentes.
    Os três números devem ser digitados pelo usuário via formulário web.*/

    $num1 = filter_input (INPUT_POST, 'num01', FILTER_SANITIZE_STRING);
    $num2 = filter_input (INPUT_POST, 'num02', FILTER_SANITIZE_STRING);
    $num3 = filter_input (INPUT_POST, 'num03', FILTER_SANITIZE_STRING);

    $maior = $num1;
    $menor = $num1;

    $array = array($num1, $num2, $num3);

    for($i = 1; $i <= 2; $i++){ 
        if ($array[$i] < $menor){
            $menor = $array[$i];
        }

        if ($array[$i] > $maior){
            $maior =  $array[$i];
        }
    }

    echo ("Menor número: ".$menor);
    echo ("Maior número: ".$maior);
?>