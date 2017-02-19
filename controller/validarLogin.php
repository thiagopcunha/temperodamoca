<?php
	require_once ('../model/conexao.php');
	require_once ('../model/login.php');	

		$validacao = new validacao;
		$validacao->setLogin($_POST['login']);
		$validacao->setSenha($_POST['senha']);

		$validacao->validar();
?> 
