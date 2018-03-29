<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
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
<!--MENU-PAINEL-VERTICAL-->
	<div class="menu">
		<div class="menu-wrapper">
			<div class="box-usuario">
			<!--CONDIÇÃO DA PARAECER IMAGEM -->
				<?php
					if($_SESSION['img'] == ''){
				?>
					<div class="avatar-usuario">
						<i class="fa fa-user"></i>
					</div><!--avatar-usuario-->
				<?php }else{ ?>
					<div class="img-usuario">
						<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
					</div><!--avatar-usuario-->
				<?php } ?>	

				<div class="nome-usuario">
					<p><?php echo $_SESSION['nome']; ?></p>
					<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
				</div><!--nome-usuario-->
			</div><!--box-usuario -->

<!--ITENS DO MENU -->
			<div class="itens-menus">
				<h2>Cadastro</h2>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrardepoimentos">Cadastro de Depoimentos</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarservicos">Cadastro de Serviço</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarslider">Cadastrar Slider</a>
				<h2>Gestão</h2>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>listadepoimentos">Lista de Depoimentos</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>listaservicos">Lista de Servicos</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>listaslider">Lista de Slider</a>
				<h2>Administracao do Painel</h2>
				<a <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editarusuarios">Editar Usuários</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>adicionarusuario">Adicionar Usuários</a>
				<h2>Configuração Geral</h2>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>editarsite">Editar Site</a>
				<h2>Gestão de Notícias</h2>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarcategorias">Cadastrar Categorias</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciarcategorias">Gerenciar Categorias</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrarnoticias">Cadastrar Notícias</a>
				<a href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciarnoticias">Gerenciar Notícias</a>
			</div><!--itens-menus-->
		</div><!--menu-wrapper-->
	</div><!--menu-->

<!--MENU-PAINEL-HORIZONTAL-->
	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div><!--menu-btn-->
			<div class="loggout">
				<a <?php if(@$_GET['url'] == ''){ ?> style="background: #80cbc4; padding: 30px 15px;" <?php } ?> 
					href="<?php echo INCLUDE_PATH_PAINEL ?> "><i class="fa fa-home"></i><span> Página Inicial</span></a>

				<a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa fa-window-close"></i><span> Sair</span></a>
			</div><!--loggout -->
			<div class="clear"></div><!--limpar-->
		</div><!--center -->
	</header>

<!--CARREGAR PAGINA URL AMIGAVEL-->	
	<div class="content">
		<?php Painel::loadPage(); ?>
	</div><!-- content-->

<!--JS-->	
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/jquerymask.js"></script>
	<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
<!--tinymce-->
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>
  		tinymce.init({ 
  			selector:'.tinymce',
  			plugins:'image',
  		 });
  	</script>
</body>
</html>