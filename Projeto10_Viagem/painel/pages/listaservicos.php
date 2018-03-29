<?php
//CHAMA A FUNCAO DO DELETAR O REGISTRO
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_site.servicos',$idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listaservicos');
	}else if(isset($_GET['order']) && isset($_GET['id'])){
		Painel::orderItem('tb_site.servicos',$_GET['order'],$_GET['id']);
	}

//NUMERO DE REGINTRO NA PAGINA
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
// CHAMA A FUNCAO DO NUMERODE PAGINAS
	$servicos = Painel::selectAll('tb_site.servicos',($paginaAtual - 1) * $porPagina,$porPagina*$paginaAtual);
?>

<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Serviços Cadastrados</h2>
	<div class="wrapper-table">
		<table>
			<tr>
				<td><i class="fa fa-male"></i> Serviço</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
				<td>#</td>
			</tr>
			<?php
			foreach ($servicos as $key => $value) {
			?>	
			<tr>
				<td><?php echo $value['servicos']; ?></td>
				<td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editarservico?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
				<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>listaservicos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>

				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listaservicos?order=up&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-up"></i></a></td>
				<td><a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL?>listaservicos?order=down&id=<?php echo $value['id'] ?>"><i class="fa fa-angle-down"></i></a></td>
			</tr>
			<?php } ?>
		</table>
	</div><!--WRAPPER TABLE-->

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.servicos')) / $porPagina);
			//LOOP DE PAGINAÇÃO LISTA
			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listaservicos?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'listaservicos?pagina='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--PAGINACAO-->
</div><!--BOX-CONTENT-->