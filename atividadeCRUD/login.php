<?php
	session_start();
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin = "anonymous">
        <link rel = "stylesheet" href = "login.css">
		<title>Login</title>
	</head>
	
	<body>		
		<form method = "POST" action = "tratamentologin.php">	
            <div class = "corpo">                 
                <div class = "login-form"> 
                    <h4 class="modal-title">Entre com seu e-mail e senha</h4><br>
                        
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Insira seu e-mail" id="email" class="form-control" required = "required">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senha" placeholder="Insira sua senha" id="senha" class="form-control" required = "required">
                    </div>  

                    <?php
                        if (isset ($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset ($_SESSION['msg']);
                        }	
                    ?>  
                </div>                
                
                <div class="botao">
                    <input id="botao" type="submit" class="btn btn-primary" name="entrar" value="Entrar"/>
                </div>   
            </div>
            
        </form>
	</body>
</html>