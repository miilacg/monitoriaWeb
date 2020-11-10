<?php
    /*Dado um número N, preencher um vetor com os N primeiros números da 
    série de Fibbonacci. (0, 1, 1, 2, 3, 5, 8, 13, 21….).*/

    function fibbonacci($n){   
        if($n == 0){
            echo ("Fibbonacci: 0");
        }else{      
            $i; $fib1 = 1; $fib2 = 1; $soma;
            $vetor = array("0", "1", "1");
            for($i = 3; $i < $n; $i++){
                $soma = $fib1 + $fib2;                    
                $fib1 = $fib2;                           
                $fib2 = $soma;
                $vetor[$i] = $soma;
            } 

            echo ("Fibbonacci: ");
            for($i = 0; $i < $n; $i++){
                if($i < $n-1){
                    echo ($vetor[$i].", ");
                }else{
                    echo ($vetor[$i]);
                }                
            }            
        }                          
    }
    fibbonacci(5);
?> 