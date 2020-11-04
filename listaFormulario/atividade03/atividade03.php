<?php
    /*Escreva um programa em PHP que calcule o Índice de Massa
    Corpórea(IMC) de uma pessoa. Os dados deverão ser recebidos por um
    formulário. É desejável o uso de funções.
    IMC = (peso/ (altura da pessoa)2).

    Caso o IMC esteja menor ou igual a 20, imprima na tela: Pessoa muito
    magra.
    Caso o IMC esteja maior que 20 e menor ou igual a 25, imprima na tela:
    Pessoa com peso normal.
    Caso o IMC esteja maior que 25 e menor ou igual a 30, imprima na tela:
    Pessoa um pouco acima do peso.
    Caso o IMC esteja maior que 30, imprima na tela: Procure um médico e
    cuide da alimentação.*/

    session_start();
 
    function calculaIMC($peso, $altura){
        $imc = ($peso/(($altura)*2));

        if ($imc <= 20){
            return "Pessoa muito magra";
        }else{
            if(25 >= $imc && $imc > 20){
                return "Pessoa com peso normal";
            }else{
                if(25 < $imc && $imc < 30){
                    return "Pessoa um pouco acima do peso";
                }else{
                    return "Procure um médico e cuide da alimentação.";
                }
            }
        }
    }

    $peso = filter_input (INPUT_POST, 'peso', FILTER_SANITIZE_STRING);
    $altura = filter_input (INPUT_POST, 'altura', FILTER_SANITIZE_STRING);

    $novaAltura = $altura/100; //convertendo para metros

    $resultado = calculaIMC($peso, $novaAltura);
        
    $_SESSION['msg'] = "<h6>$resultado</h6>";
    header("Location: index.php");
?>