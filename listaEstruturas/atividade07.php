<?php
    /*Dado um valor N, calcular em um mesmo programa os seguintes somatórios:
    (a) S1 = 1 + 2^2 + 3^3 + 4^4 + ... + N^N
    (b) S2 = 1 + 1/2^2 + 1/2^3 + 1/2^4 + ... + 1/2^N
    (c) S3 = 1 − 2 + 3 − 4 + 5 − 6... ± N .*/

    function s1($n){        
        $resultado = 0;
        
        for($i = 1; $i <= $n; $i++){
            $resultado = $resultado + pow($i, $i);
        } 
        echo ("Resultado S1: ".$resultado."<br />");        
    }

    function s2($n){ 
        if($n == 1){
            echo ("Resultado S2: ".$resultado."<br />");
        }else{
            $resultado = 1;
        
            for($i = 2; $i <= $n; $i++){
                $elevado = pow(2, $i);
                $resultado = $resultado + (1/$elevado);
            } 
            echo ("Resultado S2: ".$resultado."<br />"); 
        }    
    }

    function s3($n){ 
        if($n == 1){
            echo ("Resultado S2: ".$resultado."<br />");
        }else{
            $resultado = 1;
        
            for($i = 2; $i <= $n; $i++){
                if($i%2 == 0){
                    $resultado = $resultado - $i;
                }else{
                    $resultado = $resultado + $i;
                }                
            } 
            echo ("Resultado S2: ".$resultado."<br />"); 
        }    
    }

    s1(5);
    s2(3);
    s3(6);
?>