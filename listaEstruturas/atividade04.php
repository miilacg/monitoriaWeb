<?php
    /*Crie um programa em PHP que verifique se um número é par ou ímpar.*/

    function parOuImpar($num){
        if ($num%2 == 0){
            return 'par';
        }else{
            return 'ímpar';
        }
    }

    echo ("O número é ".parOuImpar(45));
?>