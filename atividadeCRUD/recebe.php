<?php	
    header("Content-Type: text/html; charset=utf-8", true);

    include 'acessoBanco.php';

    $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    $sexo = filter_input (INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);    

    if ($sexo == "Masculino"){
        $numAlistamento = filter_input (INPUT_POST, 'numAlistamento', FILTER_SANITIZE_STRING);
        $insert = "INSERT INTO usuario(nome_usuario, email, senha, sexo, numero_alistamento) VALUES ('$nome', '$email', '$senha', '$sexo', '$numAlistamento');";
        $resultado = mysqli_query($conn, $insert);
    }else{
        $insert = "INSERT INTO usuario(nome_usuario, email, senha, sexo) VALUES ('$nome', '$email', '$senha', '$sexo');";
        $resultado = mysqli_query($conn, $insert);
    }

    mysqli_close($conn);    
    header ("Location: listar.php");
?>