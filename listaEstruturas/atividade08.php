<?php
    /*Dado um número inteiro positivo n, imprima todos os números 
    inteiros ímpares de 1 até n.*/

    function impares($n){             
        for($i = 1; $i <= $n; $i++){
            if($i%2 != 0){
                if($n == $i){ //chegou no último
                    echo ($i.".");
                }else{
                    if($n%2 != 0){
                        echo ($i.", ");
                    }else{
                        if($i < $n-1){
                            echo ($i.", ");
                        }else{
                            echo ($i.".");
                        }
                    } 
                }                               
            }
        }                
    }

    echo ("Ímpares: ");
    echo (impares(5));
?>