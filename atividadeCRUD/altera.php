<?php	
    header("Content-Type: text/html; charset=utf-8", true);

    include 'acessoBanco.php';

    $excluir = filter_input (INPUT_POST, 'excluir_id', FILTER_SANITIZE_STRING);   
    $alterar = filter_input (INPUT_POST, 'alterar_id', FILTER_SANITIZE_STRING);

    if ($excluir != null && $excluir != 0){
        $delete = "DELETE FROM usuario WHERE id = '$excluir';";
        $d = mysqli_query($conn, $delete);
        header ("Location: listar.php");
    }else{
        if ($alterar != null && $alterar != 0){
            $nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $sexo = filter_input (INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
            $numAlistamento = filter_input (INPUT_POST, 'numAlistamento', FILTER_SANITIZE_STRING);

            if($sexo == "Masculino"){
                $update = "UPDATE `usuario` SET `nome_usuario`='$nome',`email`='$email',`sexo`='$sexo',`numero_alistamento`='$numAlistamento' WHERE id = '$alterar'";
            }else{
                $update = "UPDATE `usuario` SET `nome_usuario`='$nome',`email`='$email',`sexo`='$sexo' WHERE id = '$alterar'";

            }
            $u = mysqli_query($conn, $update);
            header ("Location: listar.php");
        }
    }
    
    mysqli_close($conn);      
?>