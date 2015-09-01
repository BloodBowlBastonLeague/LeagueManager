/**

 * Rempli la deuxième barre de navigation

 */

function needNav2(){
$('#navigation2').append('<li><div class="nav_button_left"></div></li>');

		

	$('.neednav2').each(function(){


		// Si c'est une liste

		if($(this).is('.liste')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Liste</div></li>');

		}

		// Si c'est un calendrier

		else if($(this).is('.calendar')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Calendrier</div></li>');

		}

		// Un classement

		else if($(this).is('.divclassement')){

			var poulename = $('.poulename',this).html();

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Classement '+poulename+'</div></li>');

		}

		// Un récapitulatif de match

		else if($(this).is('#divrecapmatch')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Récapitulatif</div></li>');

		}

		// Un tableau de stats

		else if($(this).is('.divtabstat')){

			var team_name = $('.tabstat_titre>span',this).html();

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Statistiques '+team_name+'</div></li>');

		}

		// Tableau de joueurs

		else if($(this).is('.player_listing')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Fiche</div></li>');

		}

		// Code de signature

		else if($(this).is('#code_signature')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Signature</div></li>');

		}

		// Liste des équipes

		else if($(this).is('#list_equipes')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Equipes</div></li>');

		}

		// Données du coachw

		else if($(this).is('#mes_donnees')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Mes données</div></li>');

		}

		// Formulaire de creation

		else if($(this).is('.creation')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';">Créer</div></li>');

		}

		// Récompenses

		else if($(this).is('#recompenses')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';"><a>Récompenses</a></div></li>');

		}

		// Commentaires de match

		else if($(this).is('#commentaires')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';"><a>Commentaires</a></div></li>');

		}

		// Liste de matchs

		else if($(this).is('#liste_matchs')){

			$('#navigation2').append('<li onclick="nav2(\''+ $(this).attr('id') +'\')"><div class="nav_button" onmouseover="this.style.background=\'url(img/boutons/bouton_onglet-hover.png) center bottom no-repeat\';" onmouseout="this.style.background=\'url(img/boutons/bouton_onglet.png) center bottom no-repeat\';"><a>Matchs</a></div></li>');

		}

	});

$('#navigation2').append('<li><div class="nav_button_right"></div></li>');	


	// Click sur le premier truc

	if(''!=window.location.hash){

		nav2($(window.location.hash).attr('id'));		

	}else{


		$('#navigation2>li::nth-child(2)').click();

	}

}



/**

 * Navigue entre les différentes parties de la page

 */

function nav2(id){

	$('.neednav2').hide();

	$('#'+id).show();

	$('#'+id).parents().show();

}



/**

 * Chargement complet de la page

 */

$(window).load(function(){

	needNav2();

});