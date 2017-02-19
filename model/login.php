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
            Mensagem 
        </title>

        <style type="text/css">
          body{
            font-family: Corbel, century gothic, Arial;
            color: #363636;
            font-size: 14pt;
            margin-left: 20px;
          }

          input.alterar{
            color: #000;
            background-color: #fff;
            width:98px;
            height: 30px;
            margin-left: 20px;
            margin-top: 3px;
            margin-bottom: 6px;
            border: 1px solid #000;
          }

          hr{

            max-width: 100%;
            border: 1px solid #000;
          }

        </style>


        <?php
	require_once ('../model/conexao.php');
	
	Class validacao extends conexao{

		private $login;
		private $senha;
		
		public function setLogin($login){
			$this->login = $login;
		}
		public function getLogin(){
			return $this->login;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}
		public function getSenha(){
			$this->senha = $senha;
		}


		public function validar(){
			$conexao = new conexao;
			$stmt = $this->pdo->prepare("SELECT * FROM administrador WHERE login = :login AND senha = :senha"); 
			$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
			$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR); 


			$stmt->execute(); 

			$obj = $stmt->fetchObject(); 

			if ($obj) { 	
				session_start(); 
				$_SESSION['login'] = $_POST['login'];
				$_SESSION["id_cliente"] = mysqli_fetch_assoc($obj)["id_adm"];
				
				header('Location: ../view/administracao.php'); 
			} 
			else{ 
				echo '<p class="erro">Login/Senha inv&aacute;lidos</p>'; 
				echo '<a href="../view/index.php">Voltar ao inicio</a>';
			} 
		}

		public function alterarUsuario(){
			$conexao = new conexao;

			if(isset($_POST['id_adm'], $_POST['nome'], $_POST['email'], $_POST['login'], $_POST['senha'])){
				$id1 = $_POST['id_adm'];
				$nome1 = $_POST['nome'];
				$email1 = $_POST['email'];
				$login1 = $_POST['login'];
				$senha1 = $_POST['senha'];

				

				try {

				  $sql = "UPDATE administrador SET nome = '{$nome1}', 
										            email = '{$email1}', 
										            login = '{$login1}',  
										            senha = '{$senha1}'  
										            WHERE id_adm = '{$id1}'";
					

				$stmt = $this->pdo->prepare($sql);
				$stmt->execute();                                  	

				}
				catch(PDOException $e) {
				  echo 'Error: ' . $e->getMessage();
				}
			}else{
				echo "<p> Algum dado está faltando. TENTE NOVAMENTE </p>";
			}

			$select = $this->pdo->query("SELECT * FROM administrador where id_adm ='{$id1}'");
 
			$result = $select->fetchAll();

			foreach($result as $linha){
?>
				<form method="POST" action="alterarUsuario.php">
						<br/><br/>
				      
				      	<h2> Alterar usuário </h2>
				      	Id : <?= $linha['id_adm']?><INPUT TYPE="hidden" NAME="id_adm" VALUE="<?= $linha['id_adm'] ?>"><br/>
				      	Nome:     <br><input  type="text"     name="nome"  value="<?= $linha['nome']?>"><p>
				        E-mail:   <br><input  type="text"     name="email" value="<?= $linha['email'] ?>"><p>
				        Login:    <br><input  type="text"     name="login" value="<?= $linha['login'] ?>"><p>
				        Senha:</b><br><input  type="password" name="senha" value="<?= $linha['senha'] ?>"><p>
                       <input class="alterar" type="submit"   value="Alterar">
    		</form>
<?php
			}	




		}

		public function lerUsuario(){
			$conexao = new conexao;

			$select = $this->pdo->query("SELECT * FROM administrador where login ='{$_SESSION['login']}'");
 
			$result = $select->fetchAll();

			foreach($result as $linha)
			{
?>
				<form method="POST" action="alterarUsuario.php">

      
      	<br/><br/>
				      
			<h2> Alterar usuário </h2>
      	Id : <?= $linha['id_adm']?><INPUT TYPE="hidden" NAME="id_adm" VALUE="<?= $linha['id_adm'] ?>"><br>
      	Nome:     <br><input  type="text"     name="nome"  value="<?= $linha['nome']?>"><p>
        E-mail:   <br><input  type="text"     name="email" value="<?= $linha['email'] ?>"><p>
        Login:    <br><input  type="text"     name="login" value="<?= $linha['login'] ?>"><p>
        Senha:</b><br><input  type="password" name="senha" value="<?= $linha['senha'] ?>"><p>
                       <input class="alterar" type="submit"   value="Alterar">
    </form>
<?php
			}	
		}

	}

?> 
