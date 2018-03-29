$(function(){

	$('body').on('submit','form.ajax-form',function(){
		var form = $(this);
		$.ajax({
			beforeSend:function(){
				$('.overlay-loading').fadeIn();
			},
			url:include_path+'ajax/formularios.php',
			method:'post',
			dataType:'json',
			data:form.serialize()
		}).done(function(data){
			if(data.sucesso){	
			//TUDO CERTO VAMOS MELHORAR A INTERFACE;
			$('.overlay-loading').fadeOut();
			$('.sucesso').slideToggle();
			setTimeout(function(){
				$('.sucesso').fadeOut();
			},3000)
		 	}else{
		 	//ALGO DEU ERRADO;
		 	$('.ovelay-loading').fadeOut();
		 	}	
		});
		return false;
	}) 

})