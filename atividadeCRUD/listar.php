<?php
    function buscaGeral(){
        include 'acessoBanco.php';

        $busca = "SELECT * FROM usuario";	          
        $verifica = mysqli_query($conn, $busca);
        if (mysqli_num_rows($verifica) >= 1){
            return mysqli_num_rows($verifica);
        }else{
            return 0;
        }
    }  
?>

<script>
 
</script>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">     

        <link rel="stylesheet" href="style.css">
        <link rel="shortout icon" href="../icon.png" type="image/x-png"> 
		<title>Cadastrados</title>
    </head>
    <body>      
        <!-- Modal -->
        <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="altera.php" id="update_tracking_number_form">                
                        <script>
                            function marcar(id){
                                var divPai = $('.opcao');
                                var input = document.createElement('input');
                                input.setAttribute('type', 'radio'); 
                                input.setAttribute('name', 'excluir_id');
                                input.setAttribute('value', id); 
                                input.setAttribute('checked', 'checked');  
                                divPai.append(input);                                 
                            }                            
                        </script>                        
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Você tem certeza que deseja excluir o cadastro?</h5>
                        </div>
                        <div class="opcao" style="display:none"></div>
                        <div class="botao">
                            <button class="btn-secondary" data-dismiss="modal">Fechar</button>
                            <button class="btn-danger"><input type='submit' value='Excluir'></button>
                        </div>  
                    </form>
                </div>
            </div>
        </div> 
        
        <div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="./altera.php">
                        <div class="modal-header">
                        <?php
                            $id = filter_input (INPUT_POST, 'numId', FILTER_SANITIZE_STRING);  
                            include 'acessoBanco.php';

                            $busca = "SELECT * FROM usuario WHERE id = '$id'";	          
                            $verifica = mysqli_query($conn, $busca);
                            $linha = mysqli_fetch_assoc($verifica);           
                        ?>
                            <h5 class="modal-title" id="exampleModalLabel">Alterar dados</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nome" class="col-form-label">Nome do usuário:</label>
                                <input required type="text" class="form-control" id="nome" value="<?php echo $linha['nome_usuario']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">E-mail:</label>
                                <input type="e-mail" class="form-control" name="email" id="email" value="<?php echo $linha['email']; ?>" required>  
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-primary" name="entrar" value="Enviar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="header">            
            <h1 id="titulo">Usúarios cadastrados</h1>
        </div>

        <div class="corpo row">
            <?php                    
                if(buscaGeral() >= 1){
                    ?>
                        <table class="table" id="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">NOME</th>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                            </tr>
                            </thead>
                            <tbody class="corpoTabela">
                                <?php
                                    include 'acessoBanco.php';

                                    $busca = "SELECT * FROM usuario";	          
                                    $verifica = mysqli_query($conn, $busca);
                                    $linha = mysqli_fetch_assoc($verifica);  
                                
                                    do{                                                                            
                                        ?>
                                            <tr>                                                
                                                <td><label type="text"><?php echo $linha['nome_usuario'];?></td>
                                                <td><button type="button" class="btn btn-primary listar" data-toggle="modal" data-target="#modalAlterar">Alterar</button></td>
                                                <td><button type="button" class="btn btn-secondary listar" data-toggle="modal" data-target="#modalExcluir" onclick="marcar('<?php echo $linha['id']; ?>');">Excluir</button></td>	                                                    
                                            </tr>                                                    
                                        <?php
                                    }while($linha = mysqli_fetch_assoc($verifica));
                                ?>                                
                            </tbody>
                        </table> 
                    <?php
                }else{
                    echo("Ainda não existe nenhum dado cadastrado! :(");
                }
            ?> 
        </div> 

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js" ></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
    </body>
</html> 