$(function(){


	/*
	console.log("Bem vindo")
	alert("Bem vindo!")
	*/

//========== MENU MOBILE 
	$('nav.mobile').click(function(){
		var listaMenu = $('nav.mobile ul');

		if(listaMenu.is(':hidden') == true){

			var icone = $('.btn-mobile-menu').find('i');
			icone.removeClass('fa-bars');
			icone.addClass('fa-times');
			listaMenu.slideToggle();
		}
		else{

			var icone = $('.btn-mobile-menu').find('i');
			icone.removeClass('fa-times');
			icone.addClass('fa-bars');
			listaMenu.slideToggle();
		}

		//====== MODELO MOBILE2 COM EFEITO
		/*listaMenu.slideToggle(); */


		//====== MODELO MOBLIE1 SEM EFEITO
		/*
		if(listaMenu.is(':hidden') == true)

			listaMenu.fadeIn();
		else
			listaMenu.fadeOut();
		*/

	});

//======EFEITO SCROLL (DESTINO,ESPECIALIDADES,DEPOIMENTOS) 
	if($('target').length > 0){
		var elemento = "#"+$('target').attr('target');
		var divScroll = $(elemento).offset().top;
		$('html,body').animate({'scrollTop':divScroll}, 2000);
	}	


//====== EFEITO MAPS CARREGAMENTO TEMPO REAL
	carregarDinamico();
	function carregarDinamico(){
		$('[realtime]').click(function(){
			var pagina = $(this).attr('realtime');
			$('.container-principal').hide();
			$('.container-principal').load(include_path+'page/'+pagina+'.php');
			
			setTimeout(function(){
				initialize();
				addMarker(-27.609959,-48.576585,'',"Minha casa",undefined,false);

			},1000);

			$('.container-principal').fadeIn(1000);
			window.history.pushState('', '',contato);

			return false;
		})
	}

})