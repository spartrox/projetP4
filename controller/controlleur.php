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

 	function traitementInscription($pseudo, $mail, $mdp){

 		// vérifier si le pseudo est déja présent
 		// vérifier si le mail est déja présent
 		// hasher le mdp


 	}
 	function pageInscription(){

 		//$mailexist = getMail();
 		//$insertmbr = getInscription();

 		require('view/affichageInscription.php');
 	}

 	function pageConnexion(){


 		require('view/affichageConnexion.php');
 	}

 	function pageProfil(){


 		require('view/affichageProfil.php');
 	}

 	function pageDeconnexion(){


 		require('view/affichageDeconnexion.php');
 	}

 	function pageAjoutChapitre(){


 		require('view/affichageAjoutChapitre.php');
 	}

 	function error($e){

   		require('view/frontend/affichageMessageErreur.php');
	}



 	




