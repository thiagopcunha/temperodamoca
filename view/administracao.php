<?php   
  extract($_REQUEST);
  require_once ('../model/conexao.php');
  require_once ('../model/cardapio.php');
 
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=
        .0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css" type="text/css">

        <link rel="icon" href="image/favicon.png" />

        <title>
           Administração
        </title>


        <style type="text/css">
            p{
              margin-left: 20px;
             
            }

            div.container{
                width: 100%;
            }

            div.visita{
              border: 1px solid #000;
              width: 300px;
              height: 80px;
              position:absolute;
              display:block;
              left: 150px;
            }

        </style>
    </head>
    <body>
    
     <div id="container" style=" background: #252525;">
            <nav class="menu">
                <br/>
                <ul>
                    <li style="font-size: 14pt; padding:15px; color:#fff; position:relative;"> Bem vindo</li>
                    <li> <a class="menu" href="lerUsuario.php">Alterar cadastro</a></li>
                    <li> <a class="menu" href="moderarMensagens.php">Moderar Mensagens</a> </li>
                    <li> <a class="menu" href="logout.php"> Sair </a></li>
               
                </ul>
                <br/>
            </nav>
    </div>
    </header>
      
          
        <div class="novo-prato">
            
            <form class="login" action="../controller/novoPrato.php" method="POST" enctype="multipart/form-data">
              <h2>Insira um novo prato</h2>
                <label class="form-novo-prato" for="nome"> Nome: </label><br/>
                <input type="text" id="nome" name="nome" required/><br/><br/>

                <label for="preco">Preço: </label><br/>
                <input type="text" id="preco" name="preco" required/><br/><br/>

                <label for="descricao">Descrição: </label><br/>
                <input type="text" id="descricao" name="descricao" required/><br/><br/>

                <label for="imagem">Imagem: </label><br/>
                <input type="file" required name="imagem"> <br/><br/>

              
                <input type="submit" class="entrar" value="Enviar" />
              <br/><br/>
            </form>
            <hr>
           

        </div>
        <?php

          require_once('contadorVisitas.php');

          $totaldia = pegaVisitas();
          $totalmes = pegaVisitas('uniques', 'mes');
            
          echo "<div class='visita'> <p> Total de visitas Diarias: $totaldia </p>";
          echo "<p> Total de visitas deste mês : $totalmes </p> </div> <br>";
          ?>
         

            <br/><br/>
      <main class="centralizado">             
      <div>
      <?php 

		
          if (isset($_SESSION["login"]) == false) {
          header("Location: index.php");
          return;
  	       }	

           $cardapio = new Cardapio;
  	

          $excluir = isset($_POST["excluir"]) ? $_POST["excluir"] : "";
          if ($excluir==true) {
          $cardapio->deletarPrato();
          }
          
          $cardapio->listarCardapioAdm();

          ?>

      </div>
    </body>
</html>



