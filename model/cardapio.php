<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="DENEB">

        <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="../view/css/style.css" type="text/css">

        <link rel="icon" href="image/favicon.png" />

        <title>
            Tempero da Moça
        </title>

        <style type="text/css">
          input.botao{
              color: #000;
              background-color: #fff;
              width:98px;
              height: 30px;
              margin-top: 3px;
              margin-bottom: 6px;
              border: 1px solid #000;
          }


        </style>

    </head>
    <body>

    <?php 


    require_once('conexao.php');

    class Cardapio extends conexao{
   
      private $nome;
      private $preco;
      private $descricao;
      private $imagem;
      public $pdo;

     
    
    public function setNome($nome) {
      $this->nome = $nome;
    }
    public function getNome() {
      return $this->nome;
    }
   
    public function getPreco() {
      return $this->preco;
    }
   
    public function setPreco($preco) {
      $this->preco = $preco;
    }
   
    public function getDescricao() {
      return $this->descricao;
    }
   
    public function setDescricao($descricao) {
      $this->descricao = $descricao;
    }    

    public function getImagem() {
       return $this->imagem;
    }
   
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function inserirPrato(){
      $conexao = new conexao;

      
      $query = $this->pdo->prepare("INSERT INTO cardapio values (null, '$this->nome', '$this->preco', '$this->descricao', '$this->imagem', NOW())");
      $query->execute(); 
    }

    public function deletarPrato(){
      try {
        $stmt = $this->pdo->prepare('DELETE FROM cardapio WHERE id = :id');
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT); 
        $stmt->execute();
         
        echo $stmt->rowCount(); 
      }
      catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
      }

    }

    public function alterarPrato(){
      $conexao = new conexao;

      if(isset($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['descricao'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];


        try {

          $sql = "UPDATE cardapio SET nome = '{$nome}', 
                                preco = '{$preco}', 
                                descricao = '{$descricao}'  
                                WHERE id = '{$id}'";
          

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();                                   

        echo "<br><br><br><p>Dados do prato atualizados com sucesso </p>";
        }
        catch(PDOException $e) {
          echo '<p> Error </p>: ' . $e->getMessage();
        }
      }else{
        echo "<p> Algum dado está faltando. TENTE NOVAMENTE </p>";
      }
    }


      public function listarCardapio(){
        $conexao = new conexao;

        $consulta = $this->pdo->query("SELECT * FROM cardapio");

        $contador = 0;

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
          if ($contador%3==0)
          echo "<tr>";
        ?>
            <p><th>
              <form accept-charset="utf-8" method=POST action="carrinho.php">
                <input type="hidden"
                       name="id"
                       value="<?= $linha["id"]?>">
                <input type="hidden"
                       name="nome"
                       value="<?= $linha["nome"]?>">
                <input type="hidden"
                       name="preco"
                       value="<?php echo $linha["preco"];?>">

              </form>

               
                <main class="cardapio">
                        <img src="../view/image/cardapio/<?=$linha["imagem"]?>" class="org-pratos">
                        <br/><h3><label for="nome"><?= $linha["nome"]?></label></h3>
                        <label for="preco"><?= "R$ ".$linha["preco"]?></label>
                        <h5><label for="descricao"><?=$linha["descricao"]?></label></h5>
                    </div>
                  </main>
                  </div>
            </th>
        <?php
            $contador++;
            if ($contador%3==0 )
              echo "</tr>";
          endwhile;
        
      }

      public function listarCardapioAdm(){
        $conexao = new conexao;

        $consulta = $this->pdo->query("SELECT * FROM cardapio");

        $contador = 0;

        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)):
          if ($contador%3==0)
          echo "<tr>";
        ?>
            <p><th>

                
            
                    <div id="cardapio2">
                <main class="centralizado">
                <main class="cardapio">
                        <div style="margin-left: 3px; margin-right: 3px;">
                        <form accept-charset="utf-8" method="POST" action="alterarCardapio.php">
                          <img src="../view/image/cardapio/<?=$linha["imagem"]?>" class="org-pratos"><br>
                            <input TYPE="hidden" NAME="id" value="<?= $linha['id'] ?>">
                            <label for="nome">Nome: <br/><input type="text" name="nome" value="<?= $linha['nome']?>"></label>
                            <label for="preo">Preço: <br/><input type="text" name="preco" value="<?= $linha['preco']?>"></label>
                            <label for="preo">Descrição: <br/><input type="text" name="descricao" value="<?= $linha['descricao']?>"></label>
                          <input type="submit"   value="Alterar" class="botao"><br>
                        </form>

                        <form accept-charset="utf-8" method="POST" action='administracao.php'>
                          <input type="hidden" name="excluir"     value=true>
                          <input type="hidden" name="id" value=<?= $linha["id"]?>>
                          <input type="submit" value="Deletar" class="botao"> 
                        </form>

                    </div>
                    </main>
                  </main>
                  </div>
            </th>
        <?php
            $contador++;
            if ($contador%3==0)
              echo "</tr>";
          endwhile ;
        
      }

  }

      
  ?>