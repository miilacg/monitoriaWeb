<?php
    session_start();

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
                                <th scope="col">E-MAIL</th>
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
                                                <td><label type="text"><?php echo $linha['email'];?></td>
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

        <?php 
            if (isset ($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>

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

<script>
    $('#modalAlterar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Botão que acionou o modal
        var email = button.data('email') // Extrai informação dos atributos data-*
        var nome = button.data('name')
        var sexo = button.data('sexo')
           
        var modal = $(this)
        modal.find('.modal-body input.name').val(nome)
        modal.find('.modal-body input.email').val(email)
        modal.find('.modal-body select.sexo').val(sexo)          
    }) 
</script>