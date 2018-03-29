<?php	
//FUNCAO LOGIN	
	session_start();

//HOARIOS DE SÃOPAULO
	date_default_timezone_set('America/Sao_Paulo');

//FUNCAO DO EMAIL
	$autoload = function( $class){
		if($class == 'Email'){
			include_once('classes/phpmailer/PHPMailerAutoload.php');
		}
			include_once('classes/'.$class.'.php');
	};
	
	spl_autoload_register($autoload);

//DEFINIÇÃO DA LOCALIZAÇAO
	define('INCLUDE_PATH','C:/Users/Mendes/Desktop/Sistema_Gestão_Site_Viagem/Projeto10_Viagem/');

//DEFINIÇÃO DA LOCALIZAÇAO DO PAINEL LOGIN 	
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	
//DIRETORIO PARA PASTA UPLOADS ATUAL
	define('BASE_DIR_PAINEL',__DIR__.'/painel');

//CONECTAR O BANCO DE DADOS	
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','projeto10_viagem');

//CONSTANTE PARA O PAINEL CONTORLE
	define('NOME_EMPRESA','SistemaWeb');

//FUNCAO CARGO DO PAINEL
	function pegaCargo($indice){
		return  Painel::$cargos[$indice];
	}

//FUNCAO DE PERMISSÃO PARA ACESSO
	function verificaPermissaoMenu($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

//FUNCAO DE PERMISSAO PAGINA NEGADA
	function verificaPermissaoPagina($permissao){
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao_negado.php');
			die();
		}

	}

//FUNCAO PARA GRAVAR AS INF DO CADASTRO
	function recoverPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
		}
	}




?>