<?php
	// FUNCAO DE ATUALIZAR O SLIDER
	if(isset ($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide = Painel::select('tb_site.noticias','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID');
		die();
	}
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Noticias</h2><!--title-->

	<form method="post" enctype="multipart/form-data">
			<?php
				if(isset($_POST['acao'])){
			//ENVIEI O MEU FORMULARIO
					$nome = $_POST['titulo'];
					$conteudo = $_POST['conteudo'];
					$imagem = $_FILES['capa'];
					$img_atual = $_POST['img_atual'];

					$verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_site.noticias` WHERE titulo = ? AND categoria_id = ?  AND id != ?");
					$verifica->execute(array($nome,$_POST['categoria_id'],$id));
					if($verifica->rowCount() == 0){
					if($imagem['name'] != ''){
			//EXISTE O UPLOAD DE IMAGEM.
						if(Painel::imagemValida($imagem)){
							Painel::deleteFile($img_atual);
							$imagem = Painel::uploadFile($imagem);
							$slong = Painel::generateSlong($nome);
							$arr = ['titulo'=>$nome,'categoria_id'=>$_POST['categoria_id'],'conteudo'=>$conteudo,'capa'=>$imagem,'slong'=>$slong,'id'=>$id,'data'=>date('Y-m-d'),'nome_tabela'=>'tb_site.noticias'];
							Painel::update($arr);
							$slide = Painel::select('tb_site.noticias','id = ?',array($id));
							Painel::alert('sucesso',' A noticia foi editado junto com imagem!');
						}else{
							Painel::alert('erro','O formato não é valido');
						}
					}else{
						$imagem = $img_atual;
						$slong = Painel::generateSlong($nome);
						$arr = ['titulo'=>$nome,'categoria_id'=>$_POST['categoria_id'],'conteudo'=>$conteudo,'capa'=>$imagem,'slong'=>$slong,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
						Painel::update($arr);
						$slide = Painel::select('tb_site.noticias','id = ?',array($id));
						Painel::alert('sucesso',' A noticia foi editada com sucesso!');						
					}
					}else{
						Painel::alert('erro',' Já exite uma noticia com esse nome');
					}
				}
			?>
		<div class="form-group">
			<label>Nome:</label><!--nome-->
			<input type="text" name="titulo" required value="<?php echo $slide['titulo']; ?>">
		</div><!--form-group-->
		
		<div class="form-group">
			<label>Conteúdo:</label><!--nome-->
			<textarea class="tinymce" name="conteudo"><?php echo $slide['conteudo']; ?></textarea>
		</div><!--form-group-->

		<div class="form-group">
			<label>Categoria:</label>
			<select name="categoria_id">
				<?php 
					$categorias = Painel::selectAll('tb_site.categorias');
					foreach ($categorias as $key => $value) {
				?>
			<option <?php if($value['id'] == $slide['categoria_id']) echo 'selected'; ?> value="<?php echo $value['id']?>"><?php echo $value['nome'];?></option>
				<?php } ?>
			</select>
		</div><!--form-group-->
				
		<div class="form-group">
			<label>Imagem</label><!--imagem-->
			<input type="file" name="capa">
			<input type="hidden" name="img_atual" value="<?php echo $slide['capa']; ?>">
		</div><!--form-group-->
		
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form><!--form-->
</div><!--box-content-->