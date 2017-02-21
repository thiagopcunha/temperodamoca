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
            word-spacing: 3px;
            color: #480000;
          }

          a:active { 
            color: #8B0000; 
          }


        </style>

    </head>
    <body>
     <header>
<body>
    <?php 
      require_once ('../model/cardapio.php');  // local onde a classe se encontra

      if(isset($_POST['nome'])){  // Checha se há um pedido de insersão de pratos no cardapio
        $cardapio = new Cardapio;

        if(isset($_FILES['imagem'])){  // Checha se há a imagem do prato
          
          $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega extensao e converte pra minuscula
          $novoNome = md5(time()) . $extensao;  //define o nome do arquivo evitando duplicação utilizando a data
          $diretorio = "../view/image/cardapio/";  //define para onde vai o arquivo 

          move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novoNome); //efetua o upload

          echo"imagem upada";
            
          
        // seta os dados do prato e insere no banco de dados
        $cardapio->setPreco($_POST['preco']);
        $cardapio->setNome($_POST['nome']);
        $cardapio->setDescricao($_POST['descricao']);
        $cardapio->setImagem($novoNome);

        $cardapio->inserirPrato();          

        echo '<p> Prato inserido com sucesso! </p>';
        echo '<a href="../view/administracao.php"> Voltar ao inicio </a>';
        }

        
      }
      else{
        echo "<p> Erro ao inserir o prato! </p>";
      }
    ?>
</body>
</html>
