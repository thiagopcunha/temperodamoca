<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>
          Alterar usuário
        </title> 

    </head>
    <body data-spy="scroll">

      <header>
             <div id="container">
            <nav class="menu">
                <br/>
                <ul>
                    <li><a href="administracao.php" class="menu"> Voltar </a></li>
               
                </ul>
                <br/>
            </nav>
        
        </header>
      <br/>

<?php 
	extract($_REQUEST);
  require_once ('../model/conexao.php');
  require_once ('../model/login.php');

    session_start();
    if (isset($_SESSION["login"]) == false) {
        header("Location: index.php");
        return;
    }
    $login = new validacao;                                                                                                                                                                                                                                      
    $login->alterarUsuario();
    

?>
