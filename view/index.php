<?php 
    require_once('contadorVisitas.php');

     $total = pegaVisitas();
    // Pega o total de visitas únicas desde o começo do mês
    $total = pegaVisitas('uniques', 'mes');
    // Pega o total de visitas únicas desde o começo do ano
    $total = pegaVisitas('uniques', 'ano');
    // Pega o total de pageviews de hoje
    $total = pegaVisitas('pageviews');
    // Pega o total de pageviews desde o começo do mês
    $total = pegaVisitas('pageviews', 'mes');
    // Pega o total de pageviews desde o começo do ano
    $total = pegaVisitas('pageviews', 'ano');
 ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css" type="text/css">

        <link rel="icon" href="image/favicon.png" />

        <title>
            Tempero da Moça
        </title>

    </head>
    <body>
     <header>

        <div id="container">
            <nav class="menu">
                <br/>
                <ul>
                    <li><a href="index.php" class="menu">Inicio</a></li>
                    <li><a href="#welcome"  class="menu">Bem Vindo</a></li>
                    <li><a href="#cardapio" class="menu">Cardápio</a></li>
                    <li><a href="#onde" class="menu">Onde Estamos</a></li>
                    <li><a href="#contact" class="menu">Contato</a></li>
                    

                    <li class="menu_login"><a href="login.php" class="login">Login</a></li>
               
                </ul>
                <br/>
            </nav>
        
        </header>

        <section id="inicio">
        <div id="intro" class="intro">
        	<div class="inicio">
        		<h5>.</h5>
        		<h1> TEMPERO <span style="font-weight: bold">DA MOÇA</span><br/></h1>
        		<a href="#cardapio" class="btn-transparent"> Cardapio </a>
        		<a href="#onde" class="btn-transparent">Localização</a>
            </div>

        </div>
  <br/><br/>
       </section>

       <section  id="welcome" >
            <center><div id="bem_vindo">
                <h2>BEM VINDO AO <span style="font-weight: bold">TEMPERO DA MOÇA</span></h2>
                <hr class="sep">
                <p>Um restaurante e lanchonete de respeito e qualidade</p>
                
                <picture>
                        <source media="(max-width: 480px)" srcset="image/logotempero_mobile.jpg"">
                        <source media="(max-width: 768px)" srcset="image/logotempero_tablet.jpg">
                        <source media="(min-width: 769px)" srcset="image/logotempero_desktop.jpg">
                        <img src="imagens/logotempero_mobile.jpg" alt="logo">

        </picture>

            </div>
            </center>


            <br/><br/><br/><br/><br/>
        </section>

        <center>
        <section id="cardapio">
            <div id="cardapio2">
                <h2>CARDÁPIO</h2>
                    <hr class="sep">
                <p>Veja os pratos disponíveis em nosso estabelecimento!</p>
                    <main class="centralizado">
                    <table width="85%">
                        <?php 
                            extract($_REQUEST);
                            require_once ('../model/conexao.php');
                            require_once ('../model/cardapio.php');

                            $cardapio = new Cardapio;
                            $cardapio->listarCardapio();
                        ?>
                    </table>    
                    </main>
            </div>
          
            <span>
                <p>Aceitamos os cartões: <img src="image/bandeira_cartoes.png" width="200px" height="50px"></p>
            </span>
        </section>
        </center>

        <br/><br/><br/><br/><br/>

        <section id="onde">
            <center><h2>ONDE ESTAMOS</h2></center>
            <hr class="sep">
          <p class="endereco"> Localizado na Av. Esperança, nº288, Guarulhos - SP </p>
          <p class="endereco"> Telefone: (11)2382-5034 </p>
          <p class="endereco"> Email:temperodamoca@hotmail.com </p>
        

        <br/><br/>
        <center>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.92782476785!2d-46.5322871491872!3d-23.46306779728835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef541c9af67b3%3A0x951d72649b648a7a!2sN%C3%BAcleo+Americano+Instituto+de+Idiomas!5e0!3m2!1spt-BR!2sbr!4v1476647863997" width="1000" height="600" frameborder="0" style="border:0" allowfullscreen>
          
        </iframe>
        </center>
        </section>

        <br/><br/><br/><br/><br/>

        <section id="contact">
            <center><h2>CONTATO</h2></center>
            <hr class="sep">
        <div class="contato">
            
              
            <form id="formulario" method="get" action="../controller/contatar.php">
                
            <br/>
            <label for="nome">Nome: </label>
            <input class="nome" type="text" id="nome" name="nome" placeholder="Seu nome" required/><br/><br/>


            <label for="email">Email: </label>
            <input class="email" type="email"  id="email" name="email" placeholder="seuemail@example.com" required/><br/><br/>

            <label for="nome">Tel: </label>
            <input class="nome" type="nome"  id="telefone" name="telefone" placeholder="954635051" required/><br/><br/>


            <label for="comentarios"> Comentarios: </label></br/>
            <textarea class="comentarios" rows="5" cols="60" name="mensagem" placeholder="Escreva aqui seu comentario:" required/></textarea><br/><br/><br/<br/><br/<br/><br/<br/><br/>

            <button type="submit" class="button">Enviar</button>
            <br/><br/>

            <a href="mensagensEscritas.php" class="pag_comentarios"> Clique aqui para ver outros comentários.</a>
            </form>
        </div>
        
        </section>

        <br/><br/><br/>

        <footer>
            <br/><br/>
            <h1>TEMPERO DA MOÇA</h1>

            <h4>Todos os direitos reservados &copy; 2016  DESENVOLVIDO POR <a href="http://hospedagem.ifspguarulhos.edu.br/~gu1500091/" class="link_deneb">DENEB </a></h4>

        </footer>

    </body>
</html>