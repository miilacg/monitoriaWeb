<?php
    /*Dado um número inteiro positivo n, calcular a soma dos 
    n primeiros números naturais.*/

    function soma($n){   
        if($n == 0){
            echo ("Soma: 0");
        }else{
            $resultado = 0;       
            for($i = 1; $i <= $n; $i++){
                $resultado = $resultado + $i;
            } 
            echo ("Soma: ".$resultado);
        }                          
    }

    soma(5);
?>