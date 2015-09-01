/**
 * Fond de tableau de type 1 générique
 */
function fondTabType1(context){
	if(!context){context = $(document);}
	// Entete & Titre
	$("table.tabtype1",$(context)).each(function(){
		var content = '<img src="http://bbbl.fr/img/fonds/classement-entete.png" class="fondtab1" style="';
		content += 'left:'+(parseInt($(this).offset().left)-parseInt($("#page").offset().left) - 10-60)+'px;';
		content += 'width:'+(parseInt($(this).width()) + 20)+'px;';
		content += 'top:'+(parseInt($(this).offset().top)-parseInt($(this).parent().offset().top) - 30)+'px;';
		content += '"/>';
		content += '<img src="http://bbbl.fr/img/fonds/classement-title.png" class="fondtitle1" style="';
		content += 'left:'+(parseInt($(this).offset().left)-parseInt($("#page").offset().left) - 10-60)+'px;';
		content += 'width:'+(parseInt($(this).width()) + 20)+'px;';
		content += 'top:'+(parseInt($(this).offset().top)-parseInt($(this).parent().offset().top) - 10)+'px;';
		content += '"/>';
		$(this).before(content);
	});
	// Les lignes
	$("table.tabtype1 tbody tr",$(context)).each(function(i){
		// HOF seulement 5 lignes
		if($(context).is('.hof_conteneur') && i>$('#nbaff').val()){return;}
		var content = '<img src="http://bbbl.fr/img/fonds/classement-body.png" class="fondbody1" style="';
		content += 'left:'+(parseInt($(this).offset().left)-parseInt($("#page").offset().left) - 5 -60)+'px;';
		content += 'width:'+(parseInt($(this).width()) + 10)+'px;';
		content += 'top:'+(parseInt($(this).offset().top)-parseInt($(this).parents('div').offset().top) - 2)+'px;';
		content += '"/>';
		$(this).parents('table').before(content);
	});	
}
/**
 * Ajoute le fond pour le tableau de stats
 * ainsi que la tache d sang sous le titre du tableau
 */
function fondTabStat(context){
	if(!context){context = $(document);}
	// Fond du tableau
	$("table.tabstat",context).each(function(){
		var content ='<img src="http://bbbl.fr/img/fonds/fond_tabstat4.png" class="fondtabstat" style="';
		
		//content += 'top:'+(parseInt($(this).offset().top) - parseInt($(this).parent().offset().top)- 65)+'px;';
		//content += 'left:'+(parseInt($(this).offset().left) - parseInt($(this).parent().offset().left) - 60)+'px;';
		content += 'top:-40px;';
		content += 'left:0px;';
		
		//content += 'width:'+($(this).width() + 40)+'px;';
		//content += 'height:963px;';
		content += '"/>';
		$(this).before(content);
    });/*
	// Tache de sang
	$("table.tabstat .tabstat_titre span").each(function(){
		var content = '<img src="http://bbbl.fr/img/fonds/blood_parchment.png" class="fondtabstat" style="';
		//content += 'width:'+($(this).width() + 80)+'px;';
		content += 'width:0px;';
		//content += 'height:'+($(this).height() + 50)+'px;';
		content += 'height:0px;';
		content += 'top:'+ (parseInt($(this).offset().top )-parseInt($(this).parent().offset().top ) - 5)+'px;';
		content += 'left:'+(parseInt($(this).offset().left)-parseInt($(this).parent().offset().left) - 50)+'px;';
		content += '"/>';
		$(this).before(content);
	});*/
}
/**
 * Fond tableau de joueurs
 */
function fondPlayerListing(){return false;
	$('.player_listing').each(function(){
		/*
		var content = '<img class="fondtabstat" src="http://bbbl.fr/img/fonds/player-listing-haut.png" style="';
		content += 'top:'+(parseInt($(this).offset().top)-25)+'px;';
		content += 'left:'+(parseInt($(this).offset().left)-20)+'px;';
		content += 'width:'+(parseInt($(this).width())+40)+'px;';
		content += 'height:297px;" alt=""/>';
		content += '<img class="fondtabstat" src="http://bbbl.fr/img/fonds/player-listing-bas.png" style="';
		content += 'top:'+(parseInt($(this).offset().top)+parseInt($(this).height())-(354)+20)+'px;';
		content += 'left:'+(parseInt($(this).offset().left)-20)+'px;';
		content += 'width:'+(parseInt($(this).width())+40)+'px;';
		content += 'height:354px;" alt=""/>';
		*/
		var content = '<img class="fondtabstat" src="http://bbbl.fr/img/fonds/player-listing.png" style="';
		//content += 'top:'+(parseInt($(this).offset().top)-parseInt($("#page").offset().top)-25)+'px;';
		content += 'top:-25px;';
		//content += 'left:'+(parseInt($(this).offset().left)-parseInt($("#page").offset().left)-52)+'px;';
		content += 'left:-52px;';
		//content += 'width:'+(parseInt($(this).width())+40)+'px;';
		//content += 'height:297px;';
		content += '" alt=""/>';
		$(this).prepend(content);
		// Milieu
		content = '<img class="fondtabstat" src="http://bbbl.fr/img/fonds/player-listing-milieu.png" style="';
		content += 'height:198px;" alt=""/>';
	});
	// Tache de sang titre
	$(".player_listing h1>span").each(function(){
		var content ='<img src="http://bbbl.fr/img/fonds/blood_parchment.png" class="fondtitleplayerlisting" style="';
		//content += 'top:'+($(this).offset().top - 5)+'px;';
		//content += 'top:'+(parseInt($(this).offset().top) - parseInt($("#page").offset().top) - 5)+'px;';
		content += 'top:'+(parseInt($(this).offset().top) - parseInt($(this).parent().offset().top) - 5)+'px;';
		//content += 'top:0px;';
		//content += 'left:'+($(this).offset().left - 50)+'px;';
		//content += 'left:'+(parseInt($(this).offset().left) - parseInt($("#page").offset().left) - 50)+'px;';
		content += 'left:'+(parseInt($(this).offset().left) - parseInt($(this).parent().offset().left) - 50)+'px;';
		content += 'width:'+($(this).width() + 80)+'px;';
		content += 'height:'+($(this).height() + 50)+'px;';
		content += '"/>';
		$(this).before(content);
	});
}

/**
 * Fond de tableau hof
 * /
function fondTabHof(conteneur){
	var rtop = $(conteneur).offset().top;
	var rleft = $(conteneur).offset().left;
	// Entete & Titre
	$("table.hof_list", conteneur).each(function(){
		var content = '<img src="http://bbbl.fr/img/fonds/classement-entete.png" class="fondtab1" style="';
		content += 'width:'+parseInt($(this).width() + 70)+'px;';
		content += 'top:'+parseInt($(this).offset().top - 30 - rtop)+'px;';
		content += 'left:'+parseInt($(this).offset().left - 10 - rleft)+'px;';
		content += '"/>';
		content += '<img src="http://bbbl.fr/img/fonds/classement-title.png" class="fondtitle1" style="';
		content += 'width:'+parseInt($(this).width() + 70)+'px;';
		content += 'top:'+parseInt($(this).offset().top - 16 - rtop)+'px;';
		content += 'left:'+parseInt($(this).offset().left - 10 - rleft)+'px;';
		content += '"/>';
		$(this).before(content);
	});
	// Les lignes
	$("table.hof_list tbody tr", conteneur).each(function(i){
		if(4<i){return;}
		var content = '<img src="http://bbbl.fr/img/fonds/classement-body.png" class="fondbody1" style="';
		content += 'left:'+parseInt($(this).offset().left - 0 - rleft)+'px;';
		content += 'width:'+parseInt($(this).width() + 50)+'px;';
		content += 'top:'+parseInt($(this).offset().top - 2 - rtop)+'px;';
		content += 'height:34px;';
		content += '"/>';
		$(this).parents('table').before(content);
	});
	// Le conteneur garde sa taille
	$(conteneur).css({'width':$(conteneur).width()+'px','height':$(conteneur).height()+'px'})
	$('th',conteneur).each(function(){$(this).css('width',$(this).width()+'px')});
}*/

/**
 * Fond de formulaire
 */
function fondFormType1(){
	// Fond du formulaire
	$(".formtype1").each(function(){
		var content = '<img src="http://bbbl.fr/img/fonds/classement-title.png" class="fondform" style="';
		content += 'left:'+parseInt(parseInt($(this).offset().left)-parseInt($(this).parent().offset().left) - 10)+'px;';
		content += 'width:'+parseInt($(this).width() + 30)+'px;';
		content += 'top:'+parseInt(parseInt($(this).offset().top)-parseInt($(this).parent().offset().top) - 10)+'px;';
		content += 'height:'+parseInt($(this).height() + 40)+'px;';
		content += '"/>';
		$(this).before(content);
    });
}

/**
 * Fond d'un onglet
 */
function fondTitleJournee(){
	// Fond de l'onglet
	$(".calendar h2").each(function(){
		var content = '<img src="http://bbbl.fr/img/fonds/onglet-journee.png" class="fond" style="';
		//content += 'left:'+parseInt($(this).offset().left - $(this).parent().parent().offset().left - 0)+'px;';
		content += 'width:'+parseInt($(this).width() + 100)+'px;';
		//content += 'top:'+parseInt($(this).offset().top - $(this).parent().parent().offset().top - 22)+'px;';
		content += 'height:'+parseInt($(this).height() + 10)+'px;';
		content += '"/>';
		$(this).prepend(content);
    });
}
/**
 * Fond du titre du calendrier
 */
function fondTitleCalendar(){
	// Fond de l'onglet
	$(".calendar h1").each(function(){
		$(this).prepend('<img src="http://bbbl.fr/img/fonds/onglet-p3.png"/>')
		//.append('<img src="http://bbbl.fr/img/fonds/onglet-p4.png" style="position:absolute;top:0px;right:-165px;"/>')
		//.css({'background-image':'url(http://bbbl.fr/img/fonds/onglet-p2.png)'})
		;
    });
	/*$('.calendar').each(function(){
		$(".imgcupcalendar",this).css({'position':'absolute','z-index':'2','top':($(this).offset().top + 30) + 'px','left':$(this).offset().left + 'px'});
	});*/
}

/*
// Fond du contenu principal
function fondPage(){
	var content = '<img class="fondpage" src="http://bbbl.fr/img/fonds/fond-page.png" style="position:absolute;';
	//content += 'top:'+($('#page').offset().top)+'px;';
	content += 'top:0px;';
	//content += 'left:'+($('#page').offset().left)+'px;';
	content += 'left:0px;';
	content += 'width:'+($("#page").width()+1) +'px;';
	content += 'height:'+($("#page").height()+parseInt($('#page').css('padding-top'))+parseInt($('#page').css('padding-bottom'))+1)+'px;';
	content += 'z-index:-2;';
	content += '"/>';
	
	//$("#page").before(content);
	$("#page").prepend(content);
}
*/

// Au chargement du document
$(window).load(function(){
	// Fond du site;
	//fondPage();
	
	// Fond tableaux de type 1
	fondTabType1();
	
	// Fond des tableaux de classement
	//fondTabClassement(); // Géré en type1
	
	// Fond du tableau de statistiques
	fondTabStat();
	
	// Fond de formulaire
	fondFormType1();
	
	// Fond Title Calendrier
	fondTitleCalendar();
	// Fond des onglets de journée
	fondTitleJournee();
	
	fondPlayerListing();
});