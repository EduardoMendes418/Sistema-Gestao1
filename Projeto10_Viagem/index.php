<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site_editar`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $infoSite['titulo']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="palavra-chave,do,meu,site">
		<meta name="description" content="Descriçao do meu website">
		<meta charset="utf-8">	
	<!--LINK-->
		<link rel="stylesheet"  type="text/css" href="<?php echo INCLUDE_PATH; ?>css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">	
		<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>css/font-awesome.min.css">
		<link rel="icon" type="x-icon" href="<?php echo INCLUDE_PATH;?>favicon.ico"> <!-- ico da pagina-->
	</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
<!--URL PARA SCROLL NOS MENUS -->
	<?php
	$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'destinos':
				echo '<target target="destinos"/>';
				break;
			case 'especialidades':
				echo '<target target="especialidades"/>';
				break;
			case 'depoimentos':
				echo '<target target="depoimentos"/>';	
		}
	?>
<!--FORMULARIO-->
	<div class="sucesso">Formulario com sucesso!</div>
<!--CARREGAMENTO DA PAGINA-->
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH; ?>image/ajax.gif"/>
	</div><!--overlay-loading-->
	
	<header>
		<div class="center">
			<div class="logo left"><a href="/">LOGOMENDES</a></div>	
			<nav class="desktop right">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>destinos">Destinos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>noticia">Notícias</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>especialidades">Especialidades</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>	
				</ul>
			</nav><!--desktop-->
			<nav class="mobile right">
				<div class="btn-mobile-menu">
					<i class="fa fa-bars" aria-hidden="true"></i>	
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>destinos">Destinos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>noticia">Notícias</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>especialidades">Especialidades</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div><!--limpar site-->
		</div><!--center-->
	</header><!--mobile-->

<!--URL AMIGAVEL-->
	<?php
		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}else{
			if($url != 'destinos' && $url != 'especialidades' && $url != 'depoimentos'){
				$urlPar = explode('/',$url)[0];
				if($urlPar != 'noticia'){
				$pagina404 = true;
				include('pages/404.php');
				}else{
					include('pages/noticia.php');
				}
			}else{
				include('pages/home.php');	
			}	
		}	
	?>

<!--FOOTER-->
	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
		<div class="center">
			<p>Todos direitos reservados <i class="fa fa-creative-commons" aria-hidden="true"></i>LogoMendes-2018</i></p>
		</div>
	</footer>

<!--JS-->	
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/function.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
<!--JS FORMULARIO -->
	<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
<!--JS PARTE DE VALIDAÇAO SLIDER SOMENTE NA HOME-->
    <?php
    	if($url == 'home' || $url == ''){
    ?>		
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
    <?php } ?>

<!--JS SELETOR DE CATEGORIAS PAG NOTICIAS -->
	<?php
		if(is_array($url) && strstr($url[0],'noticia') !== false){
	?>
		<script>
			$(function(){
				$('select').change(function(){
					location.href=include_path+"noticia/"+$(this).val();
				})
			})
		</script>
	<?php
		}
	?>

<!--JS MAP CONTATO -->
	<?php
		if($url == 'contato'){
	?>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
	<?php } ?>
	
</body>
</html>