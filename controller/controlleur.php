 <?php

 	require('model/modele.php');

 	function pageAccueil(){

 		require('view/affichageAccueil.php');
 	}

 	function listeChapitres(){

 		 	$req = getChapitres();

			require('view/affichageChapitre.php');
 	}

 	function chapitreEtCommentaires(){

 		$donnees = getChapitre($_GET['id']);
 		$comments = getCommentaires($_GET['id']);

 		require('view/affichageCommentaire.php');
 	}




