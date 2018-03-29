<?php
	// FUNCAO DE ATUALIZAR O SLIDER
	if(isset ($_GET['id'])){
		$id = (int)$_GET['id'];
		$slide = Painel::select('tb_site.slider','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID');
		die();
	}
?>

<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Slider</h2><!--title-->

	<form method="post" enctype="multipart/form-data">
			<?php
				if(isset($_POST['acao'])){
			//ENVIEI O MEU FORMULARIO
					$nome = $_POST['nome'];
					$imagem = $_FILES['imagem'];
					$img_atual = $_POST['img_atual'];
					
					if($imagem['name'] != ''){

			//EXISTE O UPLOAD DE IMAGEM.
						if(Painel::imagemValida($imagem)){
							Painel::deleteFile($img_atual);
							$imagem = Painel::uploadFile($imagem);
							$arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slider'];
							Painel::update($arr);
							$slide = Painel::select('tb_site.slider','id = ?',array($id));
							Painel::alert('sucesso','O slide foi editado junto com imagem!');
						}else{
							Painel::alert('erro','O formato não é valido');
						}
					}else{
						$imagem = $img_atual;
						$arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slider'];
						Painel::update($arr);
						$slide = Painel::select('tb_site.slider','id = ?',array($id));
						Painel::alert('sucesso','O slide foi editado com sucesso!');						
					}
				}
			?>
		<div class="form-group">
			<label>Nome:</label><!--nome-->
			<input type="text" name="nome" required value="<?php echo $slide['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label><!--imagem-->
			<input type="file" name="imagem">
			<input type="hidden" name="img_atual" value="<?php echo $slide['slide']; ?>">
		</div><!--form-group-->
		
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form><!--form-->
</div><!--box-content-->