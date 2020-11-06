<?php
    /*Escreva um programa em PHP para encontrar as raízes de 
    uma equação do segundo grau.*/

    function raizQuadrada($a, $b, $c){
        $delta = ((pow($b, 2)) - 4*$a*$c);
        
        if($delta < 0){
            echo("A equação não tem raízes reais.");
        }else{
            $raiz = sqrt ($delta);
            if($delta == 0){
                $x = (($b + $raiz)/(2*$a));
                echo("A raíz da equação é: ".$x);
            }else{
                $x = (($b + $raiz)/(2*$a));
                $y = (($b - $raiz)/(2*$a));
                echo("As raízes da equação são: ".round($x, 3)." e ".round($y, 3));
            }            
        }
    }

    raizQuadrada(1, 8, 4);
?>