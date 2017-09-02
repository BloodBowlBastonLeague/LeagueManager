/**
 * Affiche les stats demandées et cache le reste
 */
function statsDisplay(type){
// Pour chaque tableau de statistique
	$('.tabstat').each(function(){
		// pour chaque ligne du tableau
		$('tr',this).each(function(){
			// pour chaque case
			$('th,td',this).each(function(i){
				// Si c'est le nom du joueur ou bien une stat voulue
				if(i < 2 || i < 16 && type == 'realisees' || type == 'subies' && i > 15){
					// On affiche la case
					//$(this).fadeIn(1000);
					$(this).show();
				}else{
					//$(this).fadeOut(1000);
					$(this).hide();
				}
			});
		});
	});
}
/**
 * Affiche les statistiques des actions réalisées
 */
function statsActionsRealisees(){statsDisplay('realisees');}
/**
 * Affiche les statistiques des actions subies
 */
function statsActionsSubies(){statsDisplay('subies');}
/**
 * Charge des statistiques de joueurs et le place dans le conteneur précisé
 */
function loadStats(idteam,idsaison,conteneur){
	$.get("index.php" ,{'page':'loadstats','idteam':idteam,'idsaison':idsaison},function(data){
		$(conteneur).html(data);
		
		// Remise en place du fond du tableau de stats
		fondTabStat(conteneur);
		// Mise en place des ascenseurs
		placeAscenseur(conteneur);
		placeEventFlc();
		// Affichage des 16 premiers
		first16($('.tabstat',conteneur));
		
		// rebing du tooltip
		tooltip();
	});
}

// Au chargement du dom
$(document).ready(function(){
	// On affiche les statistiques réalisées
	statsActionsRealisees();
});