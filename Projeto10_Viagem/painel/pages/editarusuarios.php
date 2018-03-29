<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuários</h2><!--title-->

	<form method="post" enctype="multipart/form-data">
			<?php
				if(isset($_POST['acao'])){
			//ENVIEI O MEU FORMULARIO
					$nome = $_POST['nome'];
					$senha = $_POST['password'];
					$imagem = $_FILES['imagem'];
					$img_atual = $_POST['img_atual'];
					
					$usuario = new Usuario();
					if($imagem['name'] != ''){
			//EXISTE O UPLOAD DE IMAGEM.
						if(Painel::imagemValida($imagem)){

							Painel::deleteFile($img_atual);

							$imagem = Painel::uploadfile($imagem);
						if($usuario->atualizarUsuario($nome,$senha,$imagem)){
							$_SESSION['img']= $imagem;
							Painel::alert('sucesso','Atualizado com sucesso junto com imagem!');	
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar junto com imagem');
							}	
						}else{
							Painel::alert('erro','O formato não é valido');
						}
					}else{
						$imagem = $img_atual;
						if($usuario->atualizarUsuario($nome,$senha,$imagem)){
							Painel::alert('sucesso','Atualizado com sucesso');	
						}else{
							Painel::alert('erro','Ocorreu um erro ao atualizar...');	
						}
					}
				}
			?>
		<div class="form-group">
			<label>Nome:</label><!--nome-->
			<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Senha:</label><!--senha-->
			<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required>
		</div><!--form-group-->

		<div class="form-group">
			<label>Imagem</label><!--imagem-->
			<input type="file" name="imagem">
			<input type="hidden" name="img_atual" value="<?php echo $_SESSION['img']; ?>">
		</div><!--form-group-->
		
		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar">
		</div><!--form-group-->

	</form><!--form-->
</div><!--box-content-->