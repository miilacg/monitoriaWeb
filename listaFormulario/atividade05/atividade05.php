<?php
    /*Criar um formulário que receba os seguintes campos:
    Nome;
    e-mail;
    senha;
    confirmar senha;
    data de nascimento;
    sexo.
    O sistema deverá enviar esse formulário para uma nova página que deverá conferir se
    a pessoa deverá se alistar para o exército (sexo masculino) e se o voto dela é
    obrigatório, proibido ou faculdativo. (menores de 16 proibido, entre 16 e 18 e os
    maiores de 60 é facultativo, entre 18 e 60 são obrigatórios). Também deverá conferir
    se as senhas são iguais. Estas conferências devem ser realizadas através de funções.*/
 
    session_start();

    function alistamento(){
        $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $sexo = filter_input (INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
        if ($sexo == 'Masculino'){
            return "A ".$nome." deve se alistar no exercito.";
        }else{
            return "A ".$nome." não deve se alistar no exercito.";
        }
    }

    function voto(){
        $dataNascimento = filter_input (INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);

        $anoAtual = date('Y');
        $mesAtual = date('M');
        $diaAtual = date('d');

        for($i = 0; $i < 10; $i++){
            if($i <= 3){
                $anoNascimento[$i] = $dataNascimento[$i];
            }else{
                if($i > 4 && $i < 7){
                    $mesNascimento[$i-5] = $dataNascimento[$i]; 
                }else{
                    if($i > 7){
                        $diaNascimento[$i-8] = $dataNascimento[$i]; 
                    }
                }
            }
        }
        $anoNascimento = implode('', $anoNascimento);
        $mesNascimento = implode('', $mesNascimento);
        $diaNascimento = implode('', $diaNascimento);
     
        if(($anoAtual - $anoNascimento) > 18 && ($anoAtual - $anoNascimento) <= 60){
            return "Voto obrigatorio";
        }else{
            if((($anoAtual - $anoNascimento) < 18 && ($anoAtual - $anoNascimento) >= 16) || ($anoAtual - $anoNascimento) > 60){
                return "Voto facultativo";
            }else{
                if(($anoAtual - $anoNascimento) < 16){
                    return "Voto proibido";
                }else{
                    if(($anoAtual - $anoNascimento) == 18 && ($mesAtual - $mesNascimento) > 0){
                        return "Voto obrigatorio";
                    }else{
                        if(($anoAtual - $anoNascimento) == 18 && ($mesAtual - $mesNascimento) < 0){
                            return "Voto facultativo";
                        }else{
                            return "Voto proibido";
                        }
                    }
                }
            }
        }
    }

    function confereSenha($senha, $confirmarSenha){
        if ($senha === $confirmarSenha){
            return "Senha confirmada";
        }else{
            $_SESSION['msg'] = "<p>As senhas não coincidem</p>";
            header("Location: index.php");
        }
    }
    $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $confirmarSenha = filter_input (INPUT_POST, 'senhaConfirma', FILTER_SANITIZE_STRING);
    $dataNascimento = filter_input (INPUT_POST, 'dataNascimento', FILTER_SANITIZE_STRING);
    $sexo = filter_input (INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">     

        <link rel="stylesheet" href="../style.css">
        <link rel="shortout icon" href="#" type="image/x-png"> 
		<title>Atividade 05</title>
    </head>
    <body>        
        <div class="header">            
            <h4>Alistamento</h4>
        </div>

        <div class="corpo row">
            <div class="container">
                <h6>Senha confirmada</h6><br>
                <h6><?php echo alistamento();?></h6><br>
                <h6><?php echo voto();?></h6>
            </div>                 
        </div>           
    </body>
</html>