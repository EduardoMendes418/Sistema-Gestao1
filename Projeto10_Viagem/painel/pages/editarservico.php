<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$servico = Painel::select('tb_site.servicos','id = ?',array($id));

	}else{
		Painel::alert('erro',' Voce precisa passar o parametro ID.');
		die();
	}
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Serviço</h2>

	<form method="post" enctype="multipart/form-data">	
		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso',' O servico foi Atualizado com sucesso!');
					$servico = Painel::select('tb_site.servicos','id = ?',array($id));				
			}else{
					Painel::alert('erro','Campos vazios nao foi permitido.');				
				}
			}
		?>

		<div class="form-group">
			<label>Serviço:</label>
			<textarea class="tinymce" name="servicos"><?php echo $servico['servicos']; ?></textarea>
		</div><!--form-group-->


		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_site.servicos" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->
	</form>
</div><!--BOX CONTENT-->	

