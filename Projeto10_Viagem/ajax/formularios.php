<?php
include('../config.php');
	$data = array();
	$assunto = 'Novo mensagem no site';
	$corpo = '';
foreach ($_POST as $key => $value) {
		$corpo.=ucfirst($key).": ".$value;
		$corpo.="<hr>";
	}
	$info = array('assunto'=>$assunto,'corpo'=>$corpo);
	$mail = new Email('br834.hostgator.com.br','comercial@dankeweb.com','Projetoweb@418','Eduardo');
	$mail->addAdress('eduardomendes418@dankeweb.com','Eduardo');
	$mail->formatarEmail($info);
if($mail->enviarEmail()){
		$data['sucesso'] = true;
}else{
		$data['erro'] = true;
	}

	//$data['retorno'] = 'sucesso';	
	die(json_encode($data));
?>