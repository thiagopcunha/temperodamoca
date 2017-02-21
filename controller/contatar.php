<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">


        <link rel="icon" href="image/favicon.png" />

        <title>
            Novo prato
        </title>

        <style type="text/css">
          body{
            font-family: Corbel, century gothic, Arial;
            color: #363636;
            font-size: 16pt;
            text-align: center;
            

          }

          a{
            text-decoration: none;
            word-spacing: 4px;
            color: #480000;
          }

          a:active { 
            color: #8B0000; 
          }


        </style>

    </head>
    <body>
<?php 
       require_once ('../model/mensagem.php');  // local onde a classe se encontra

      echo "Obrigado.&nbsp;";  
      // comando que seta os dados e insere no banco de dados
      if(isset($_GET['nome'])){
        $ins = new Mensagem;
        $ins->setEmail($_GET['email']);
        $ins->setNome($_GET['nome']);
        $ins->setTel($_GET['telefone']);
        $ins->setMensagem($_GET['mensagem']);

        $ins->inserirMensagem();

        echo 'Mensagem enviada com sucesso! <br>';
        echo '<a href="../view/index.php">Voltar ao inicio</a>';
      }
      else{
        echo "fail";
      }

?>


</body>
</html>
