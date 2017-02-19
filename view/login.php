<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <title>
            Login
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
        <div class="div_formulario_login">
            <form method="post" action="../controller/validarLogin.php">

                <h2>Execute o login*</h2>
                <label for="login">Login: </label>
                <input name="login" type="text" id="login" placeholder="Seu Login" required/><br/><br/>


                <label for="senha">Senha: </label>
                <input type="password" id="senha" name="senha" placeholder="********" required/>

                 <br/><br/>
                <input type="submit" class="entrar" value="Entrar" />

                <h4>*Apenas funcionarios cadastrados</h4>

            </form>
        </div>
   	</body>
</html>