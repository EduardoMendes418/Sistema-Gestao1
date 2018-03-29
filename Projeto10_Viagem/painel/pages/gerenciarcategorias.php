<?php
//CHAMA A FUNCAO DO DELETAR O REGISTRO
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_site.categorias',$idExcluir);
		$noticias = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = ?");
		$noticias->execute(array($idExcluir));
		$noticias = $noticias->fetchAll();
		foreach ($noticias as $key => $value) {
			$imgDelete = value['capa'];
			Painel::deleteFile($imgDelete);
		}
		$noticias = MySql::conectar()->prepare("DELETE FROM `tb_site.noticias` WHERE categoria_id = ?");
		$noticias->execute(array($idExcluir));

		Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciarcategorias');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
	}

//NUMERO DE REGINTRO NA PAGINA
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
// CHAMA A FUNCAO DO NUMERODE PAGINAS
	$categorias = Painel::selectAll('tb_site.categorias',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Categorias Cadastradas</h2>
	<div class="wrapper-table">
		<table>
			<tr>
				<td><i class="fa fa-male"></i> Nome</td>
				<td><i class="fa fa-angle-down"></i></td>
				<td><i class="fa fa-angle-down"></i></td>
				<td>#</td>
				<td>#</td>
			</tr>
			<?php
			foreach ($categorias as $key => $value) {
			?>	
			<tr>
				<td><?php echo $value['nome']; ?></td>
				<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editarcategoria?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
				<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciarcategorias?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>

				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciarcategorias?order=up&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-up"></i></a></td>
				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>gerenciarcategorias?order=down&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-down"></i></a></td>
			</tr>
			<?php } ?>
		</table>
	</div><!--WRAPPER TABLE-->

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);
			//LOOP DE PAGINAÇÃO LISTA
			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciarcategorias?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciarcategorias?pagina='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--PAGINACAO-->
</div><!--BOX-CONTENT-->