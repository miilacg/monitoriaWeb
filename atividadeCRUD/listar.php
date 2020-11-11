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
    
    function busca($pesquisa){
        include 'acessoBanco.php';

        $busca = "SELECT * FROM usuario";	          
        $verifica = mysqli_query($conn, $busca);
        $linha = mysqli_fetch_assoc($verifica);

        if ($pesquisa == 'nome'){
            return $linha['nome_usuario'];
        }else{
            if ($pesquisa == 'id'){
                return $linha['id'];
            }
        }
    } 
?>

<script>
    function newPopup(){
        newpopupWindow = window.open ('', 'pagina', "width=250 height=250");
        newpopupWindow.document.write ("Você tem certeza que deseja excluir o cadastro? </br> <a>Sim</a> </br> <a href='javascript:fecharPopup()'>Não</a>");
    }

    function fecharPopup(){
        fecharWindow = newpopupWindow.close();
    }
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
        <link rel="shortout icon" href="#" type="image/x-png"> 
		<title>Cadastro</title>
    </head>
    <body>        
        <div class="header">            
            <h1 id="titulo">Usuúarios cadastrados</h1>
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
                                                <td><label type="text" name="<?php echo $linha['id']; ?>"><?php echo $linha['nome_usuario']; ?></td>
                                                <td><buttun class="btn btn-primary listar"><a>Alterar</a></button></td>
                                                <td><buttun class="btn btn-secondary listar"><a style="color: white" href="javascript:newPopup();">Excluir</a></button></td>	
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
    </body>
</html> 