<?php
//CHAMA A FUNCAO DO DELETAR O REGISTRO
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = Mysql::conectar()->prepare("SELECT slide FROM `tb_site.slider` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));
		$imagem = $selectImagem->fetch()['slide'];
		Painel::deleteFile($imagem);
		Painel::deletar('tb_site.slider',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listaslider');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.slider',$_GET['order'],$_GET['id']);
	}

//NUMERO DE REGINTRO NA PAGINA
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
// CHAMA A FUNCAO DO NUMERODE PAGINAS
	$slide = Painel::selectAll('tb_site.slider',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Lista de Slider</h2>
	<div class="wrapper-table">
		<table>
			<tr>
				<td><i class="fa fa-male"></i> Nome</td>
				<td><i class="fa fa-calendar"></i> Imagem</td>
				<td><i class="fa fa-angle-down"></i></td>
				<td><i class="fa fa-angle-down"></i></td>
				<td>#</td>
				<td>#</td>
			</tr>
			<?php
			foreach ($slide as $key => $value) {
			?>	
			<tr>
				<td><?php echo $value['nome']; ?></td>
				<td><img style="width: 50px; height: 50px;" src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['slide']; ?>" /></td>
				<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editarslider?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
				<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listaslider?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>

				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listaslider?order=up&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-up"></i></a></td>
				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listaslider?order=down&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-down"></i></a></td>
			</tr>
			<?php } ?>
		</table>
	</div><!--WRAPPER TABLE-->

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.slider')) / $porPagina);
			//LOOP DE PAGINAÇÃO LISTA
			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listaslider?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listaslider?pagina='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--PAGINACAO-->
</div><!--BOX-CONTENT-->