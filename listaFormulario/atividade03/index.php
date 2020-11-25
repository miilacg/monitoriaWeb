<?php
	session_start();
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
        <link rel="shortout icon" href="../../icon.png" type="image/x-png"> 
		<title>Atividade 03</title>
    </head>
    <body>        
        <div class="header">            
            <h4>Calculadora de IMC</h4>
        </div>

        <div class="corpo row">
            <div class="container">
                <form class="" method="post" action="./atividade03.php">                
                    <h2>Entre com os dados</h2>
                    <div class="espaco">                                          
                        <div class= "form-group">
                            <label for="peso">Peso (em quilos) <span> * </span></label>
                            <input type="number" class="form-control" name="peso" id="peso" required>
                        </div>                                                 
                        <div class= "form-group">
                            <label for="altura">Altura (em centimetro) <span> * </span></label>
                            <input type="number" class="form-control" name="altura" id="altura" required>
                        </div>
                    </div> 
                    
                    <?php
                        if (isset ($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset ($_SESSION['msg']);
                        }
                    ?>   
                    <hr>  
                    <div class="botao">
                        <input id="botao" type="submit" class="btn btn-primary" name="entrar" value="Enviar"/>
                    </div>
                </form>                  
            </div>                 
        </div>           
    </body>
</html>