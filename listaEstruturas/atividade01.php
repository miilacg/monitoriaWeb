<?php
    /*Crie um programa em php para calculo da área de um circulo.*/

    function calculaAreaCirculo($raio){
        $area = pi() * pow($raio, 2);
        return $area;
    }

    echo ("Area calculada: ".calculaAreaCirculo(3));
?>