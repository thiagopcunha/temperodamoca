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
          }

          input.deletar{
            color: #000;
            background-color: #fff;
            width:98px;
            height: 30px;
            margin-left: 20px;
            margin-top: 3px;
            margin-bottom: 6px;
            border: 1px solid #000;
          }

          input.msg{
            margin-left: 10px;
          }

          hr{
            max-width: 100%;
            border: 1px solid #000;
          }

        </style>

    </head>
    <body>

<?php 

    require_once('conexao.php');

    class Mensagem extends conexao{
   
      private $nome;
      private $email;
      private $telefone;
      private $mensagem;
      public $pdo;

     
    
    public function setNome($nome) {
      $this->nome = $nome;
    }
    public function getNome() {
      return $this->nome;
    }
   
    public function getEmail() {
      return $this->email;
    }
   
    public function setEmail($email) {
      $this->email = $email;
    }
   
    public function getTel() {
      return $this->tel;
    }
   
    public function setTel($telefone) {
      $this->telefone = $telefone;
    }    

    public function getMensagem() {
       return $this->Mensagem;
    }
   
    public function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }
    function inserirMensagem(){
      $conexao = new conexao;
      
      $query = $this->pdo->prepare("INSERT INTO contato values (null,'$this->nome', '$this->email', '$this->telefone', '$this->mensagem')");
      $query->execute();
    }


      public function listarMensagens(){
        $conexao = new conexao;

        $consulta = $this->pdo->query("SELECT * FROM contato");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr><td>Nome: {$linha['nome']} - Mensagem: {$linha['mensagem']}</td></tr>";
        }
        
      }

      public function listarMensagensAdm(){
        $conexao = new conexao;

        $consulta = $this->pdo->query("SELECT * FROM contato");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr><td>Nome: {$linha['nome']} - Mensagem: {$linha['mensagem']}</td></tr>";
?>
          <form accept-charset="utf-8" method="POST" action='moderarMensagens.php'>
                          <input type="hidden" name="excluir"     value=true>
                          <input class ="msg" type="hidden" name="idmsg" value=<?= $linha["id_msg"]?>>
                          <input class="deletar" type="submit" value="Deletar" >
                          <hr>
          </form>
<?php
        }
      }
      
      public function deletarMensagem(){
      try {
        $stmt = $this->pdo->prepare("DELETE FROM contato WHERE id_msg = :id_msg");
        $stmt->bindParam(':id_msg', $_POST['idmsg'], PDO::PARAM_INT); 
        $stmt->execute();
         
        echo "mensagem deletada  com sucesso";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=moderarMensagens.php'>";
      }
      catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

    }
  }

      
  ?>