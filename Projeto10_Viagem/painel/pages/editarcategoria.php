<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$categoria = Painel::select('tb_site.categorias','id = ?',array($id));
	}else{
		Painel::alert('erro',' Voce precisa passar o parametro ID.');
		die();
	}
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Categoria</h2>

	<form method="post" enctype="multipart/form-data">	
		<?php
			if(isset($_POST['acao'])){
				$slong = Painel::generateSlong($_POST['nome']);
				$arr = array_merge($_POST,array('slong'=>$slong));
				$verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?");
				$verificar->execute(array($_POST['nome'],$id));
				$info = $verificar->fetch();
				if($verificar->rowCount() == 1 ){
					Painel::alert('erro',' Já existe uma categoira com esse nome');
				}else{
				if(Painel::update($arr)){
					Painel::alert('sucesso',' A categoria foi editada com sucesso!');
					$categoria = Painel::select('tb_site.categorias','id = ?',array($id));				
				}else{
					Painel::alert('erro','Campos vazios nao foi permitido.');				
					}
				}
			}
		?>

		<div class="form-group">
			<label>Categoria:</label>
			<input type="text" name="nome" value="<?php echo $categoria['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_site.categorias" />
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->
	</form>
</div><!--BOX CONTENT-->	

