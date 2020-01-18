 <?php

 	//Fait le lien avec le modele
 	require('model/modele.php');

 	//Création des différentes fonction

 	function pageAccueil(){

 		require('view/affichageAccueil.php');
 	}

 	function listeChapitres(){

 		 	$req = getChapitres();

			require('view/affichageChapitre.php');
 	}

 	function pageCommentaires(){

 		$donnees = getChapitre($_GET['id']);
 		$comments = getCommentaires($_GET['id']);

 		require('view/affichageCommentaire.php');
 	}

 	function pageRenseignements(){

 		require('view/affichageRenseignements.php');
 	}

 	function pageInscription(){


 		require('view/affichageInscription.php');
 	}

 	function pageConnexion(){


 		require('view/affichageConnexion.php');
 	}

 	




