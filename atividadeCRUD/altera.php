<?php	
    header("Content-Type: text/html; charset=utf-8", true);

    include 'acessoBanco.php';

    $excluir = filter_input (INPUT_POST, 'excluir_id', FILTER_SANITIZE_STRING);   
    echo $excluir;
    $delete = "DELETE FROM usuario WHERE id = '$excluir';";
    $d = mysqli_query($conn, $delete);

    mysqli_close($conn);    
    header ("Location: listar.php");
?>