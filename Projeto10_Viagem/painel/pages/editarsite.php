<?php
	$site = Painel::select('tb_site_editar',false);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Configuração do Site</h2>

	<form method="post" enctype="multipart/form-data">	
		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST,true)){
					Painel::alert('sucesso',' O site foi Atualizado com sucesso!');
					$site = Painel::select('tb_site_editar',false);				
			}else{
					Painel::alert('erro','Campos vazios nao foi permitido.');				
				}
			}
		?>

<!-- TITULO DO SITE-->
		<div class="form-group">
			<label>Titulo do Site:</label>
			<input type="text" name="titulo" value="<?php echo $site['titulo']; ?>">
		</div><!--form-group-->

<!-- NOME DO AUTOR-->
		<div class="form-group">
			<label>Nome do Autor:</label>
			<input type="text" name="nome_autor" value="<?php echo $site['nome_autor']; ?>" />
		</div>

<!-- DESCRICAO-->
		<div class="form-group">
			<label> Descricao:</label>
			<textarea class="tinymce" name="descricao"><?php echo $site['descricao']; ?></textarea>
		</div>
		
<!-- REPLICANDO ICONES 1,2,3-->		
		<?php
			for($i = 1; $i <= 3; $i++){
		?>
		<div class="form-group">
			<label>Icone <?php echo $i; ?>:</label>
			<input type="text" name="icone<?php echo $i; ?>" value="<?php echo $site['icone'.$i]; ?>">
		</div>
		<div class="form-group">
			<label>Descricao <?php echo $i; ?>:</label>
			<textarea name="descricao<?php echo $i; ?>"><?php echo $site['descricao'.$i]; ?></textarea>	
		</div>
			
		<?php } ?>	

		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="tb_site_editar" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->
	</form>
</div><!--BOX CONTENT-->	

