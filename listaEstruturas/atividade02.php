<?php
    /*Crie um programa em PHP para retornar dentre 3 números inteiros, qual desses é o
    maior. Suponha que os três números são diferentes.*/

    function maior($num1, $num2, $num3){
        $maior = $num1;

        if ($num2 > $maior){
            $maior = $num2;
        }

        if ($num3 > $maior){
            $maior = $num3;
        }

        return $maior;
    }

    echo ("Maior número: ".maior(5, 2, 4));
?>