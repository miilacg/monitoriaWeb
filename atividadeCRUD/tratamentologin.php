<?php 
    session_start(); 

    header("Content-Type: text/html; charset=UTF-8");
    include 'acessoBanco.php';
		
    $email = $_POST['email'];
    $senha = $_POST['senha'];

	$_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;     

    $login = "SELECT email, senha FROM usuario WHERE email = '$email' AND senha = '$senha'";

    $verifica = mysqli_query($conn, $login);
    if (mysqli_num_rows($verifica) >= 1){
        header("Location: bemVindo.php");
    }else{
        $_SESSION['msg'] = "<p style = 'margin:-15px 0 0 0; color:red; font-family: arial; font-size: 15px; text-align: center;'> E-mail e/ou senha incorretos </p>";
        header("Location: login.php");
    }

?>	