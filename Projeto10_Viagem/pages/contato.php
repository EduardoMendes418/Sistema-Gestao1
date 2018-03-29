<!--ID DO MAP-->
<div id="map"></div>
<!--PAG CONTATO-->
	<div class="contato-container">
		<div class="center">
			<h2 class="contato-titulo">Contato</h2>
			<form method="post" class="ajax-form" action="">
				<input required type="text" name="nome" placeholder="Nome..">
				<div></div><!--Espaço no formulario-->
				<input required type="text" name="email" placeholder="E-mail..">
				<div></div><!--Espaço no formulario-->
				<input required type="text" name="telefone" placeholder="Telefone..">
				<div></div><!--Espaço no formulario-->
				<textarea required placeholder="Sua Mensagem.." name="mensagem"></textarea>
				<div></div><!--Espaço no formulario-->
				<input type="hidden" name="identificador" value="form_contato"/>
				<input type="submit" name="acao" value="Enviar">
			</form>
			<div class="clear"></div>
		</div><!--center-->
	</div><!--contato-container-->	