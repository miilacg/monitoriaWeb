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
		<title>Atividade 02</title>
    </head>
    <body>        
        <div class="header">            
            <h4>Calculadora</h4>
        </div>

        <div class="corpo row">
            <div class="container">
                <form class="" method="post" action="./atividade02.php">                
                    <h2>Entre com os números e com o operador</h2>
                    <div class="espaco">                                          
                        <div class= "form-group">
                            <label for="num01">Primeiro número <span> * </span></label>
                            <input type="number" class="form-control" name="num01" id="num01" required>
                        </div>                                                 
                        <div class= "form-group">
                            <label for="op">Operador <span> * </span></label>
                            <input type="text" class="form-control" name="op" id="op" required>
                        </div>
                        <div class= "form-group">
                            <label for="num02">Segundo número <span> * </span></label>
                            <input type="number" class="form-control" name="num02" id="num02" required>
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