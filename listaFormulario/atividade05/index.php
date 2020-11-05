<?php
	session_start();
?>

<script>
    /*confere se a senha inserida é igual a senha de validação*/
    function comparaSenha(){
        var senha = document.getElementById('senha').value;
        var senhaConfirma = document.getElementById('senhaConfirma');   

        if (senha === senhaConfirma.value){
            senhaConfirma.setCustomValidity('');
            senhaConfirma.setAttribute('style', 'box-shadow:focus: 0 0 0 0.2rem rgba(0,123,255,.25);');
        }else{
            senhaConfirma.setCustomValidity("Senhas diferentes!");
            document.getElementById('senhaConfirma').value = "";
            senhaConfirma.setAttribute('style', 'box-shadow: 0 0 0 0.2rem rgba(255, 0, 0,.25);');
        }
        document.getElementById('erroSenha').innerHTML = senhaConfirma.validationMessage;
    }

    function validaData(){//resolver o problema com as datas
        var dataNascimento = document.getElementById('dataNascimento');

        var data = new Date();
        var diaAtual = data.getDate();           // 1-31
        var mesAtual = data.getMonth();          // 0-11 (zero=janeiro)
        var anoAtual = data.getFullYear();       // 4 dígitos

        var i, ano = [], mes = [], dia = [];
        var data = dataNascimento.value; 
       
        for(i = 0; i < 10; i++){
            if(i <= 3){
                ano[i] = data[i];
            }else{
                if(i > 4 && i < 7){
                    mes[i-5] = data[i]; 
                }else{
                    if(i > 7){
                        dia[i-8] = data[i]; 
                    }
                }
            }
        }

        ano = ano.join('');
        mes = mes.join('');
        dia = dia.join('');

        if(ano > anoAtual){
            dataNascimento.setCustomValidity("Entre com uma data anterior a data atual");
            document.getElementById('dataNascimento').value = "";
            dataNascimento.setAttribute('style', 'box-shadow: 0 0 0 0.2rem rgba(255, 0, 0,.25);');
        }else{
            if(ano == anoAtual){
                if(mes > (mesAtual + 1)){
                    dataNascimento.setCustomValidity("Entre com uma data anterior a data atual");
                    document.getElementById('dataNascimento').value = "";
                    dataNascimento.setAttribute('style', 'box-shadow: 0 0 0 0.2rem rgba(255, 0, 0,.25);');
                }else{
                    if(mes == (mesAtual + 1)){
                        if(dia >= diaAtual){
                            dataNascimento.setCustomValidity("Entre com uma data anterior a data atual");
                            document.getElementById('dataNascimento').value = "";
                            dataNascimento.setAttribute('style', 'box-shadow: 0 0 0 0.2rem rgba(255, 0, 0,.25);');
                        }else{
                            dataNascimento.setCustomValidity('');
                            dataNascimento.setAttribute('style', 'box-shadow:focus: 0 0 0 0.2rem rgba(0,123,255,.25);');
                        }
                    }else{
                        dataNascimento.setCustomValidity('');
                        dataNascimento.setAttribute('style', 'box-shadow:focus: 0 0 0 0.2rem rgba(0,123,255,.25);');
                    }
                }
            }else{
                console.log(ano);
                console.log(anoAtual);
                dataNascimento.setCustomValidity('');
                dataNascimento.setAttribute('style', 'box-shadow:focus: 0 0 0 0.2rem rgba(0,123,255,.25);');
            }
        }

        document.getElementById('erroData').innerHTML = dataNascimento.validationMessage;

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

        <link rel="stylesheet" href="../style.css">
        <link rel="shortout icon" href="#" type="image/x-png"> 
		<title>Atividade 05</title>
    </head>
    <body>        
        <div class="header">            
            <h4>Alistamento</h4>
        </div>

        <div class="corpo row">
            <div class="container">
                <form class="" method="post" action="./atividade05.php">                
                    <h2>Entre com os dados</h2>
                    <div class="espaco">                                          
                        <div class="form-group">
                            <label for="nome">Nome <span> * </span></label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>                                                 
                        <div class="form-group">
                            <label for="dataNascimento">Data de nascimento<span> * </span></label>
                            <input type="date" class="form-control" name="dataNascimento" id="dataNascimento" onblur="validaData();" required>
                            <div class="erro" id="erroData" style="font-size:1.55vw; margin-top:.8vw"></div>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo<span> * </span></label>
                            <select class= "form-control" id="sexo" name="sexo" required><br>
                                <option value="">Escolha uma opção</option> 
                                <option value="Feminino">Feminino</option>  
                                <option value="Masculino">Masculino</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mails<span> * </span></label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha<span> * </span></label>
                            <input type="password" class="form-control" name="senha" id="senha" required>
                        </div>
                        <div class="form-group">
                            <label for="senhaConfirma">Confirme a senha<span> * </span></label>
                            <input type="password" class="form-control" name="senhaConfirma" id="senhaConfirma" onblur="comparaSenha();" required>
                            <div class="erro" id="erroSenha" style="font-size:1.55vw; margin-top:1.3vw"></div>
                        </div>
                    </div>   
                    <hr>  
                    <div class="botao">
                        <input id="botao" type="submit" class="btn btn-primary" name="entrar" value="Enviar" onclick="comparaSenha()"/>
                    </div>
                </form>                  
            </div>                 
        </div>           
    </body>
</html>