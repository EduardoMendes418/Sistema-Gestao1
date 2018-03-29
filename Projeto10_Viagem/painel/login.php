<?php
	//COOKIE LEMBRAR
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
			$info = $sql->fetch();
			//logamos com sucesso
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];
			header('Location: '.INCLUDE_PATH_PAINEL);
			die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>css/font-awesome.min.css">
</head>
<body>
	<div class="img-page">
		<img src="../image/page-img-login.jpg">	
	</div>
		<div class="box-login">		
			
			<?php
			//CONEÇÃO DE DO BANCO 
				if(isset($_POST['acao'])){
					$user = $_POST['user'];
					$password = $_POST['password'];
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
					$sql->execute(array($user,$password));
					if($sql->rowCount() == 1){
						$info = $sql->fetch();
						//logamos com sucesso
						$_SESSION['login'] = true;
						$_SESSION['user'] = $user;
						$_SESSION['password'] = $password;
						$_SESSION['cargo'] = $info['cargo'];
						$_SESSION['nome'] = $info['nome'];
						$_SESSION['img'] = $info['img'];
						if(isset($_POST['lembrar'])){
							//COOKIE QUARDAR AS INFORMAÇÕES DO USUARIO
							setcookie('lembrar',true,time()+(60+60+24),'/');
							setcookie('user',$user,time()+(60+60+24),'/');
							setcookie('password',$password,time()+(60+60+24),'/');
						}
						header('Location: '.INCLUDE_PATH_PAINEL);
						die();
					}else{
						//falhou
						echo '<div class="erro-box"><i class="fa fa-times"></i> Usuario ou senha incorreta</div>';
					}	
				}
			?>

			<h2>Efetue o login:</h2>
			<form method="post">
				<input type="text" name="user" placeholder="Login.." required>
				<input type="password" name="password" placeholder="Senha.." required>
				<div class="form-group-login left">
					<input type="submit" name="acao" value="Logar">
				</div><!--FORM-GROUP-LOGIN-->
				<div class="form-group-login right">
					<label>Lembra-me</label>
					<input type="checkbox" name="Lembrar" />
				</div><!--FORM-GROUP-LOGIN-->
				<div class="cler"></div>
			</form><!--POST-->
		</div><!--BOX-LOGIN-->

	</body>
</html>