<?php
    /*Crie um formulário web onde usuário entra com dois operandos (números)
    e seleciona uma operação matemática para ser realizada com os operandos
    (/, -, +, *).
    Daí imprime a resposta da operação, na mesma página, logo abaixo.*/

    session_start();

    $num1 = filter_input (INPUT_POST, 'num01', FILTER_SANITIZE_STRING);
    $op = filter_input (INPUT_POST, 'op', FILTER_SANITIZE_STRING);
    $num2 = filter_input (INPUT_POST, 'num02', FILTER_SANITIZE_STRING);

    switch ($op) {
        case '/':
            if($num == 0){
                $resultado = "Não é possivel dividir por zero";                
            }else{
                $resultado = $num1/$num2;                
            } 
            break ;     
        case '-':
            $resultado = $num1-$num2;
            break;
        case '*':
            $resultado = $num1*$num2;
            break;
        case '+':
            $resultado = $num1+$num2;
            break;
        default :
            $resultado = "Erro";
    }
        
    $_SESSION['msg'] = "<h2>Resultado: $resultado</h2>";
    header("Location: index.php");
?>