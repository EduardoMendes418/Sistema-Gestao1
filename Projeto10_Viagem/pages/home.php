<?php
	$infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site_editar`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>
<!--BANNER-->
	<section class="banner-container">
		<div style="background-image: url('<?php echo INCLUDE_PATH;?>image/banner-3.jpg');" class="banner-single"></div>
		<div style="background-image: url('<?php echo INCLUDE_PATH;?>image/banner-2.jpg');" class="banner-single"></div>
		<div style="background-image: url('<?php echo INCLUDE_PATH;?>image/banner-4.jpg');" class="banner-single"></div>
			<div class="overlay"></div><!--tecnica de sombra no banner-->
		<div class="center">
			<form method="post" class="ajax-form">
				<h2>Qual o seu melhor e-mail !</h2>
				<input type="email" name="email" required />
				<Input type="hidden" name="indentificador" valor="form_home" />
				<input type="submit" name="acao" value="Cadastrar"> 
			</form>
			<div class="bullets"></div><!--bullets--> 
		</div><!--center-->
	</section><!--banner-principal-->
<!--PAISAGEM-AUTOR-->
	<section class="descricao-autor" id="destinos">
		<div class="center">
			<div class="w100 left">
			<h2 class="text-center"><img src="<?php echo INCLUDE_PATH ?>image/paisagem-autor.jpg" /> <?php echo $infoSite['nome_autor']; ?></h2>
				<p><?php echo $infoSite['descricao']; ?></p>
			</div><!--w50-->
			<div class="clear"></div><!--limpar site-->
		</div><!--center-->
	</section><!--descricao-autor-->	
<!--ESPECIALIDADES-->	
	<section class="especialidades">	
		<div class="center">
			<h2 class="title" id="especialidades">Especilidades</h2>
			<div class=" w33 left box-especilidade">
				<h3><i class="<?php echo $infoSite['icone1']; ?>" aria-hidden="true"></i></h3>
				<h4>Mochilão</h4>
				<div><img src="<?php echo INCLUDE_PATH; ?>image/bg-2-espe.jpg"></div>
				<p><?php echo $infoSite['descricao1']; ?></p>
			</div><!--box-especilidade-->
			<div class="w33 left box-especilidade">
				<h3><i class="<?php echo $infoSite['icone2']; ?>" aria-hidden="true"></i></h3>
				<h4>Europa</h4>
				<div><img src="<?php echo INCLUDE_PATH; ?>image/bg-1-espe.jpg"></div>
				<p><?php echo $infoSite['descricao2']; ?></p>
			</div><!--box-especilidade-->
			<div class=" w33 left box-especilidade">
				<h3><i class="<?php echo $infoSite['icone3']; ?>" aria-hidden="true"></i></h3>
				<h4>Natureza</h4>
				<div><img src="<?php echo INCLUDE_PATH; ?>image/bg-3-espe.jpg"></div>
				<p><?php echo $infoSite['descricao3']; ?></p>
			</div><!--box-especilidade-->
			<div class="clear"></div><!--limpar site-->
		</div><!--center-->
	</section><!--especialidades-->
<!--DEPOIMENTOS-->
	<section class="extras">
		<div class="center">
			<div class="w50 left depoimentos-container">
				<h2 class="title" id="depoimentos">Depoimentos</h2>
				<!--FUNCAO PARA PUCHAR OS DEPOIMENTOS DO DB-->
				<?php
					$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
					$sql->execute();
					$depoimentos = $sql->fetchAll();
					foreach ($depoimentos as $key => $value) {
				?>					
				<div class="depoimentos-single">
					<p class="depoimentos-descricao">"<?php echo $value['depoimento']; ?>"</p>
					<p class="autor">" <?php echo $value['nome']; ?> " - <?php echo $value['data']; ?></p>
				</div><!--depoimentos-single-->
				<?php } ?>
			</div><!--w50-->
<!--SERVIÇOS-->			
			<div class="w50 left servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
					<ul>
						<?php
							$sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3");
							$sql->execute();
							$servicos = $sql->fetchAll();
							foreach ($servicos as $key => $value) {
						?>
							<li><?php echo $value['servicos']; ?></li>
						<?php } ?>
					</ul>
				</div><!--servicos-->
			</div><!--w50-->
			<div class="clear"></div><!--limpar site-->
		</div><!--center-->
	</section><!--extras-->
<!--servicos -->