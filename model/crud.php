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

        </style>

    </head>
    <body><?php
      
      include_once('conexao.php');
      include_once('mensagem.php');

      function Inserir() {
          try {
              $sql = "INSERT INTO contato (    
                  nome,
                  email,
                  telefone,
                  mensagem)
                  VALUES (
                  :nome,
                  :email,
                  :telefone,
                  :mensagem)";
   
              $p_sql = Conexao::getInstance()->prepare($sql);
   
              $p_sql->bindValue(":nome", $usuario->getNome());
              $p_sql->bindValue(":email", $usuario->getEmail());
              $p_sql->bindValue(":telefone", $usuario->getTel());
              $p_sql->bindValue(":mensagem", $usuario->getMensagem());

   
   
              return $p_sql->execute();
          } catch (Exception $e) {
              print " <p> Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. </p>";
              GeraLog::getInstance()->inserirLog("<p> Erro: Código: <p>" . $e->getCode() . " Mensagem: " . $e->getMessage());
          }
      }

         $pojo = new Mensagem;
          $pojo->setNome("assa");
          $pojo->setEmail("isaa");
          $pojo->setTel("321321");
          $pojo->setMensagem("sasasasa");
          $pojo->Inserir();
          return $pojo;

?>