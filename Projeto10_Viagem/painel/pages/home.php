<?php
//VERIFICAR USUARIOS ONLINE
	$usuariosOnline = Painel::listarUsuariosOnline();

//VISITASTOTAIS
	$pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
	$pegarVisitasTotais->execute();
	$pegarVisitasTotais = $pegarVisitasTotais->rowCount();

//VISITASHOJE
	$pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
	$pegarVisitasHoje->execute(array(date('Y-m-d')));
	$pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>
	<div class="box-content w100 left">
			<h2><i class=" fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?></h2> 
				<div class="box-metrica">
					<div class="box-metrica-single">
						<div class="box-metrica-wrapper">
							<h3>Usuario Online</h3>
							<p><?php echo count($usuariosOnline); ?></p>
						</div><!--box-metrica-wrapper-->
					</div><!--box-metrica-single-->
				</div><!--box-metrica-->
				<div class="box-metrica">
					<div class="box-metrica-single">
						<div class="box-metrica-wrapper">
							<h3>Total de Visitas</h3>
							<p><?php echo $pegarVisitasTotais; ?></p>
						</div><!--box-metrica-wrapper-->
					</div><!--box-metrica-single-->
				</div><!--box-metrica-->				
				<div class="box-metrica">
					<div class="box-metrica-single">
						<div class="box-metrica-wrapper">
							<h3>Visitas de Hoje</h3>
							<p><?php echo $pegarVisitasHoje; ?></p>
						</div><!--box-metrica-wrapper-->
					</div><!--box-metrica-single-->
				</div><!--box-metrica-->
	</div><!--box-content-->
	<div class="clear"></div>

<!--USUARIOS ONLINE NO SITE-->
	<div class="box-content w100 ">
		<h2><i class=" fa fa-rocket" aria-hidden="true"></i> Usuário Online no Site</h2> 
		<div class="table-responsivo">
			<div class="row">
				<div class="col colcolor">
					<span>IP</span>
				</div><!--col-->
				<div class="col colcolor">
					<span>Ultima ação</span>
				</div><!--col-->
					<div class="clear"></div>
			</div><!--row-->
			
			<?php
				foreach ($usuariosOnline as $key => $value) {
			?>				
			<div class="row">
				<div class="col">
					<span><?php echo $value['ip'] ?></span>
				</div><!--col-->
				<div class="col">
					<span><?php echo date('d/m/Y H:i:s',strtotime($value['utima_acao'])) ?></span>
				</div><!--col-->
					<div class="clear"></div>
			</div><!--row-->
			<?php } ?>
		</div><!--table-responsivo-->
	</div><!--box-content-->

<!--USUARIOS DO PAINEL-->
	<div class="box-content w100">
		<h2><i class="fa fa-rocket" aria-hidden="true"></i> Usuário do Painel</h2>	
		<div class="table-responsivo">
			<div class="row">
				<div class="col colcolor">
					<span>Nome</span>	
				</div><!--COL-->
				<div class="col colcolor">
					<span>Cargo</span>
				</div><!--COL-->
				<div class="clear"></div>
			</div><!--ROW-->
		<?php
			$usuariosPainel = MySql::conectar()->prepare("SELECT * FROM	`tb_admin.usuarios` ");
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
			foreach ($usuariosPainel as $key => $value)	{
		?>
			<div class="row">
				<div class="col">
					<span><?php echo $value['user'] ?></span>
				</div><!--COL-->
				<div class="col">
					<span><?php echo pegaCargo($value['cargo']); ?></span>
				</div><!--COL-->
				<div class="clear"></div>
			</div><!--COL-->
			<?php } ?>
		</div><!--TABELA-RESPONSIVO-->
	</div><!--BOX-CONTENT-->
