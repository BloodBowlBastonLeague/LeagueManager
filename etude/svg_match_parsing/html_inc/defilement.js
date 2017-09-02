/**
 * Défilement de la liste des derniers matchs
 */
function defileLastMatchs(){
	$("#matchs_news li:first")
	.delay(1000).animate({'margin-left':'-580px'},5000,function(){
		$("#matchs_news li:last").after($("#matchs_news li:first"));
		$("#matchs_news li:last").css({'margin-left':'0'});
		defileLastMatchs();
	});
}

/**
 * Affiche et cache le menu de navigation
 */
function hoverNav(page){
	
	$("#navigation").hover(function(){
		$(this).stop(true);
		$(this).animate({'left':'0px'},1000);
	},function(){
		$(this).stop(true);
		if( !document.hover_nav_place &&  ('' == document.page || 'accueil2' == document.page)
		 || !document.hover_nav       && !('' == document.page || 'accueil2' == document.page)){
			$(this).animate({'left':'-176px'},1000);
		}
	});
}

/**
 * Change l'état de hover_nav
 */
function switchHoverNav(){
	document.hover_nav_place = !document.hover_nav_place;
	document.hover_nav = !document.hover_nav;
	$("#navigation").animate({'left':'-176px'},1000);
}

// On affiche seulement les 16 premières entrées du tableau
function first16(tab){
	$('tbody>tr',tab).hide();
	$('tbody>tr.visible:lt(16)',tab).show();
}


// Affiche ou pas les morts selon l'état de la checkbox
function checkMort(checkbox, table){
	if($(checkbox).is(':checked')){
		$('tr.dead',table).removeClass('invisible').addClass('visible');
	}else{
		$('tr.dead',table).removeClass('visible').addClass('invisible');
	}
	first16(table);
}
// Affiche ou pas les virés
function checkFired(checkbox, table){
	if($(checkbox).is(':checked')){
		$('tr.fired',table).removeClass('invisible').addClass('visible');
	}else{
		$('tr.fired',table).removeClass('visible').addClass('invisible');
	}
	first16(table);
}
// Affiche ou pas les blessés
function checkBlesse(checkbox, table){
	if($(checkbox).is(':checked')){
		$('tr.blesse',table).removeClass('invisible').addClass('visible');
	}else{
		$('tr.blesse',table).removeClass('visible').addClass('invisible');
	}
	first16(table);
}
// Placement des ascenseus
function placeAscenseur(context){
	if(!context){context = $(document);}
	// Ascenseur pour le tableau	
	$('.tabstat',context).each(function(){
		var content = '<img class="flc_haut" src="http://bbbl.fr/img/icon/flechehaut2.png" style="';
		content += 'top:24px;';
		content += 'right:25px;';
		content += '"/><img class="flc_bas" src="http://bbbl.fr/img/icon/flechebas2.png" style="';
		//content += 'bottom:10px;';
		content += 'top:233px;';
		content += 'right:27px;';
		content += '"/>';
		$(this).after(content);
	});
	$('.effectif',context).each(function(){
		var content = '<img class="flc_haut" src="http://bbbl.fr/img/icon/flechehaut.png" style="';
		content += 'top:430px;';
		content += 'right:0px;';
		content += '"/><img class="flc_bas" src="http://bbbl.fr/img/icon/flechebas.png" style="';
		content += 'bottom:314px;';
		content += 'right:0px;';
		content += '"/>';
		$(this).after(content);
	});
}

/**
 * Evenement de click sur les fleches d'ascenseur.
 */
function placeEventFlc(){
	// Evenement de click sur la fleche du haut => on remonte le tableau affichant les données plus basses
	$('.flc_haut').click(function(){
		// Table concernée
		var table = $(this).prev();
		var find = false;
		// Pour chaque ligne de la table on repère l'index de la première visible.
		$('tbody>tr.visible',table).each(function(i){/**/
			if(find)return;
			if($(this).is(":visible")){
				// Les index css commencent à 1 et pas à 0
				find = i+1;
			}
		});
		
		// Index maximum
		var max =  $('tbody tr.visible',table).length;
		// Si aucune ligne n'est visible, on prend la dernière
		//if(!find){find = max;}
		
		var first = Math.max(1,find-16);
		var last = first + 15;
		var tablength = $('tbody tr.visible',table).length;
		
		// On cache toutes les lignes du tableau pour ensuite n'afficher que les lignes voulues
		$('tbody tr.visible',table).hide();
		
		for(var i = first; i <= last && i <= tablength; i++)
		{
			// L'index nth-child ne passe pas au suivant si le css n'est pas bon.
			// Si une ligne est vide
			if(0 == $('tbody tr.visible:nth-child('+i+')',table).length){
				last++;
				continue;
			}
			
			// On affiche la ligne
			$('tbody tr.visible:nth-child('+i+')',table).show();
		}
	});
	// Evenemnt de click sur la fleche du bas, on descend le tableau révélant ainsi les données plus hautes.
	$('.flc_bas').click(function(){
	// Table concernée
		var table = $(this).prev().prev();
		var find = false;
		// Pour chaque ligne de la table on repère l'index de la première visible.
		$('tbody tr.visible',table).each(function(i){/**/
			if(find)return;
			if($(this).is(":visible")){
				// Les index css commencent à 1 et pas à 0
				find = i+1;
			}
		});
		// Index maximum
		var max =  $('tbody tr.visible',table).length;
		// On cache toutes le slignes du tableau pour ensuite n'afficher que les lignes voulues
		$('tbody tr.visible',table).hide();
		
		var first = Math.max(Math.min(max-15,find+16),1);
		var last = first + 15;
		var tablength = $('tbody tr.visible',table).length;
		
		
		for(var i = first; (i <= last && i <= tablength); i++)
		{
			// L'index nth-child ne passe pas au suivant si le css n'est pas bon.
			// Si une ligne est vide
			if(1 < first && 1 > $('tbody tr.visible:nth-child('+i+')',table).length){
				first--;
				/*
				console.log('first : '+first);
				// On repère la première ligne non vide
				if(1 < first){
					console.log('1 < first');
				}
				if(1 > $('tbody tr.visible:nth-child('+first+')',table).length){
					console.log('1 > length');
				}
				*/
				while(1 < first && 1 > $('tbody tr.visible:nth-child('+first+')',table).length){
					//console.log('dec');
					first--;
				}
				//console.log('devient : '+first);
				// on affiche la première ligne
				$('tbody tr.visible:nth-child('+first+')',table).show();
				continue;
			}
			
			// On affiche la ligne
			$('tbody tr.visible:nth-child('+i+')',table).show();
		}
		
	});
}

// Au chargement du document
$(document).ready(function(){
	// On affiche seulement les 16 premières entrées du tableau de l'effectif d'équipe
	first16($('.effectif'));
	// On affiche seulement les 16 premières entrées du tableau de stats
	$('.tabstat').each(function(){first16($(this));});
	
	// Placement
	placeAscenseur();

	placeEventFlc();
});

// Au chargement complet de la page
$(window).load(function(){
	// Initialisation du défilement
	defileLastMatchs();
	// Toggle du menu de navigation
	hoverNav(document.page);
	// Si on est sur une page où il y a la place et qu'on laisse le menu affiché
	if( !document.hover_nav_place &&  ('' == document.page || 'accueil2' == document.page)
	 || !document.hover_nav       && !('' == document.page || 'accueil2' == document.page)){
		$("#navigation").animate({'left':'-176px'},1000);
	}
});