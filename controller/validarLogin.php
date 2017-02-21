<?php
	require_once ('../model/conexao.php');  // requere a conexao do banco de dados
	require_once ('../model/login.php');	// classe de login

		// recebe os dados de login
		$validacao = new validacao;
		$validacao->setLogin($_POST['login']);
		$validacao->setSenha($_POST['senha']);

		// checa se os dados estão no banco de dados por meio da classe
		$validacao->validar();
?> 
