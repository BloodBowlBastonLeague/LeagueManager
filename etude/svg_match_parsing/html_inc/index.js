// On détermine sur quelle page on est
document.page = document.location.search;
var page_debut = document.location.search.indexOf('page=')+5;
if(page_debut == 4){
	document.page='';
}else{
	document.page = document.page.substring(page_debut);
	var page_length = document.page.indexOf('&');
	if(-1 != page_length){	document.page = document.page.substring(0,page_length);}
}

	// FONCTIONS SPECIALES
/**
  * Récupération des messages utilisateur
  */
function getMsgUser()
{
	// Messages de debug
	$.get("index.php",{page:"msguserdebug"},function(data,status){
		$("#msg_user_debug_content").html(data);
		if($.trim(data))
		{
			$("#msg_user_debug").show();
		}
		// Reste
		$.get("index.php",{page:"msguser"},function(data,status){
			$("#msg_user_content").html(data);
			if($.trim(data))
			{
				$("#msg_user").show();
			}
		});
	});
}



// En cas d'erreur sur la soumission du formulaire, on récupère les données en POST
function checkPost(form_id)
{
	// On ajoute aux formulaires leur propre identifiants
	$('form').each(function(){
		$(this).prepend('<input type="hidden" name="form_id" value="'+$(this).attr('id')+'"/>');
	});
	
	// Récupération des anciennes données
	$.getScript("index.php?page=checkpost&id="+ form_id);
}

/**
 * Gestion améliorée des title
 */
this.tooltip = function(){
	// Placement par rapport à la souris
	xOffset = -20;
	yOffset = 10; 
     
	$("[title]").hover(function(e){
        this.t = this.title;
        this.title = "";                                                                         
		$("body").append("<div id='tooltip'>"+ this.t +"</div>");		
		// Si trop près de la droite
		if(($(document).width() - e.pageX) < ($("#tooltip").width()+50))
		{
			$("#tooltip").css("left","").css("right",($(document).width() - e.pageX - xOffset) + "px");
		}
		else
		{
			$("#tooltip").css("right","").css("left",(e.pageX - xOffset - 10) + "px");
		}
		$("#tooltip").css("top",(e.pageY - yOffset) + "px");
		$("#tooltip")
		//.css("visibility","visible")
		.fadeIn("fast");               
    },
    function(){
		this.title = this.t;           
		$("#tooltip").remove();
    }); 
	$("[title]").mousemove(function(e){
		// Si trop près de la droite
		if(($(document).width() - e.pageX) < ($("#tooltip").width()+50))
		{
			$("#tooltip").css("left","").css("right",($(document).width() - e.pageX - xOffset) + "px");
		}
		else
		{
			$("#tooltip").css("right","").css("left",(e.pageX - xOffset - 10) + "px");
		}
		$("#tooltip").css("top",(e.pageY - yOffset) + "px");
	});                    
};

/**
 * Ferme l'élément parent
 */
function closeParent(elem){$(elem).parent().hide();}

/**
 * Réduit l'élément parent
 */
function reduitParent(elem){$(elem).parent().css('height','20px');$(elem).hide().next().show();}

/**
 * Réduit l'élément parent
 */
function restoreParent(elem){$(elem).parent().css('height','');$(elem).hide().prev().show();}


/**
 * Chargement du document
 */
$(document).ready(function(){
// TODO: à modifier pour avoir le massage de rechargement du formulaire au bon moment.
	// checkPost('all');
	// getMsgUser();
	
	//mumble();
	
	tooltip();
	
	// Evenements boutons de fermeture
	$('.close').click(function(){closeParent(this);});
	// Evenements boutons de réduction
	$('.reduit').click(function(){reduitParent(this);});
	// Evenements boutons de restauration
	$('.restore').click(function(){restoreParent(this);});
	
	// $.get('jsdyn/mumble.php',function(data){
	// 	var mumble = $(data);
	// 	$('img,a,br',$(mumble)).remove();
	// 	$('#mumble').html($(mumble).html());
	// });
});