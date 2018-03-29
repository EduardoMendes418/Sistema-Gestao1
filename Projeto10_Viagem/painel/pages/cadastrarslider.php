<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Slider</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$imagem = $_FILES['imagem'];
				if($nome == ''){
					Painel::alert('erro',' O campo nome nao pode ficar vazio!');
				}else{
					//PODEMOS CADASTRAR
					if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro',' o formato especifico nao estao correto!!');
					}else{
						//CADASTRAR NO BANCO DE DADOS
						include('../classes/lib/WideImage.php');
						$imagem = Painel::uploadFile($imagem);

						WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);
						$arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slider'];
						Painel::insert($arr);
						Painel::alert('sucesso','O cadastro do slider foi realizado com sucesso!');
					}
				}			
			}
		?>

		<div class="form-group">
			<label>Nome do Slider:</label>
			<input type="text" name="nome">
		</div><!--form-group-->		

		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>