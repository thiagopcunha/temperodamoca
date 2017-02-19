<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>
            Login - Tempero da Moça
        </title> 

    </head>
    <body data-spy="scroll">

        <header>
             <div id="container">
            <nav class="menu">
                <br/>
                <ul>
                    <li><a href="index.php" class="menu"> Inicio </a></li>
               
                </ul>
                <br/>
            </nav>
        
        </header>
        <br/>
<hr class="sep">
    <!-- BEM VINDO ============================================= -->
    <section id="bemvindo">
        <div class="container">
            <h2 align="center">Mensagens de outros clientes</h2>
            <hr class="sep">
	            <div class="table-responsive">
	            <table class='table'>
		            <?php 
						require_once ('../model/mensagem.php');
						require_once ('../model/conexao.php');

						$mensagem = new mensagem;
						$mensagem->listarMensagens();
		 			?>
	 			</table>
	 			</div>
        </div>
    </section>
    <!-- Footer
	============================================= -->

        <footer>
            <br/><br/>
            <h1>TEMPERO DA MOÇA</h1>

            <h4>Todos os direitos reservados &copy; 2016  DESENVOLVIDO POR <a href="http://hospedagem.ifspguarulhos.edu.br/~gu1500091/" class="link_deneb">DENEB </a></h4>

        </footer>

    </body>
</html>