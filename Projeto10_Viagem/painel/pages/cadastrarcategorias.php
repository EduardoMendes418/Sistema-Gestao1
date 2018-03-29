<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Categorias</h2>

	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				if($nome == ''){
					Painel::alert('erro',' O campo nome nao pode ficar vazio!');
				}else{
					//APENAS CADASTRAR NO BANCO DE DADOS
						$verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome =?");
						$verifica->execute(array($nome));
						if($verifica ->rowCount() == 0){
						$slong = Painel::generateSlong($nome);
						$arr = ['nome'=>$nome,'slong'=>$slong,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
						Painel::insert($arr);
						Painel::alert('sucesso','O cadastro da categoria foi realizado com sucesso!');
					}else{
						Painel::alert('erro',' Já existe uma categoria com esse nome');
					}
				}			
			}
		?>
		<div class="form-group">
			<label>Nome da Categoria:</label>
			<input type="text" name="nome">
		</div><!--form-group-->		

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar">
		</div><!--form-group-->
	</form>