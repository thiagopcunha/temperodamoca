<?php
/**
 * Sistema de contador de visitas
 *
 * Usado para fazer a contagem de visitas únicas e pageviews diários do site
 *
 * Método de utilização:
 *  Apenas inclua este arquivo no começo do seu site.
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 * @link http://thiagobelem.net/
 *
 * @version 1.0
 * @package ContadorVisitas
 */
 //  Configurações do Script
 // ==============================
 $_CV['registraAuto'] = true;       // Registra as visitas automaticamente?
 $_CV['conectaMySQL'] = true;       // Abre uma conexão com o servidor MySQL?
 $_CV['iniciaSessao'] = true;       // Inicia a sessão com um session_start()?
 $_CV['servidor'] = 'localhost';    // Servidor MySQL
 $_CV['usuario'] = 'root';          // Usuário MySQL
 $_CV['senha'] = '';                // Senha MySQL
 $_CV['banco'] = 'tempero';            // Banco de dados MySQL
 $_CV['tabela'] = 'visitas';        // Nome da tabela onde os dados são salvos
 // ==============================
 // ======================================
 //   ~ Não edite a partir deste ponto ~
 // ======================================
 // Verifica se precisa fazer a conexão com o MySQL
 if ($_CV['conectaMySQL'] == true) {
    $_CV['link'] = mysqli_connect($_CV['servidor'], $_CV['usuario'], $_CV['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_CV['servidor']."].");
    mysqli_select_db($_CV['link'], $_CV['banco']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_CV['banco']."].");
 }
 // Verifica se precisa iniciar a sessão
 if ($_CV['iniciaSessao'] == true) {
    session_start();
 }
/**
 * Registra uma visita e/ou pageview para o visitante
 */
 function registraVisita() {
    global $_CV;
    $sql = "SELECT COUNT(*) FROM `".$_CV['tabela']."` WHERE `data` = CURDATE()";
    $query = mysqli_query($_CV['link'], $sql);
    $resultado = mysqli_fetch_row($query);
    // Verifica se é uma visita (do visitante)
    $nova = (!isset($_SESSION['ContadorVisitas'])) ? true : false;
    // Verifica se já existe registro para o dia
    if ($resultado[0] == 0) {
        $sql = "INSERT INTO `".$_CV['tabela']."` VALUES (NULL, CURDATE(), 1, 1)";
    } else {
        if ($nova == true) {
            $sql = "UPDATE `".$_CV['tabela']."` SET `uniques` = (`uniques` + 1), `pageviews` = (`pageviews` + 1) WHERE `data` = CURDATE()";
        } else {
            $sql = "UPDATE `".$_CV['tabela']."` SET `pageviews` = (`pageviews` + 1) WHERE `data` = CURDATE()";
        }
    }
    // Registra a visita
    mysqli_query($_CV['link'], $sql);
    // Cria uma variavel na sessão
    $_SESSION['ContadorVisitas'] = md5(time());
 }
/**
 * Função que retorna o total de visitas
 *
 * @param string $tipo - O tipo de visitas a se pegar: (uniques|pageviews)
 * @param string $periodo - O período das visitas: (hoje|mes|ano)
 *
 * @return int - Total de visitas do tipo no período
 */
 function pegaVisitas($tipo = 'uniques', $periodo = 'hoje') {
    global $_CV;
    switch($tipo) {
        default:
        case 'uniques':
            $campo = 'uniques';
            break;
        case 'pageviews':
            $campo = 'pageviews';
            break;
    }
    switch($periodo) {
        default:
        case 'hoje':
            $busca = "`data` = CURDATE()";
            break;
        case 'mes':
            $busca = "`data` BETWEEN DATE_FORMAT(CURDATE(), '%Y-%m-01') AND LAST_DAY(CURDATE())";
            break;
        case 'ano':
            $busca = "`data` BETWEEN DATE_FORMAT(CURDATE(), '%Y-01-01') AND DATE_FORMAT(CURDATE(), '%Y-12-31')";
            break;
    }
    // Faz a consulta no MySQL em função dos argumentos
    $sql = "SELECT SUM(`".$campo."`) FROM `".$_CV['tabela']."` WHERE ".$busca;
    $query = mysqli_query($_CV['link'], $sql);
    $resultado = mysqli_fetch_row($query);
    // Retorna o valor encontrado ou zero
    return (!empty($resultado)) ? (int)$resultado[0] : 0;
 }
 if ($_CV['registraAuto'] == true) { registraVisita(); }