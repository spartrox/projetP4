 <?php

 	//Chargement des différents classes
 	require_once('model/PostManager.php');
	require_once('model/CommentManager.php');

 	//Création des différentes fonction
 	function pageAccueil(){

 		require('view/frontend/affichageAccueil.php');
 	}

 	function listeChapitres(){

 		 	$postManager = new PostManager(); //Création d'un objet
 		 	$posts = $postManager->getChapitres();

			require('view/frontend/affichageChapitre.php');
 	}

 	function pageCommentaires(){

 		$donnees = getChapitre($_GET['id']);
 		$comments = getCommentaires($_GET['id']);

 		require('view/frontend/affichageCommentaire.php');
 	}

 	function pageRenseignements(){

 		require('view/frontend/affichageRenseignements.php');
 	}

 	function traitementInscription($pseudo, $mail, $mdp){

 		// vérifier si le pseudo est déja présent
 		// vérifier si le mail est déja présent
 		// hasher le mdp


 	}
 	function pageInscription(){

 		//$mailexist = getMail();
 		//$insertmbr = getInscription();

 		require('view/frontend/affichageInscription.php');
 	}

 	function pageConnexion(){


 		require('view/frontend/affichageConnexion.php');
 	}

 	function pageProfil(){


 		require('view/frontend/affichageProfil.php');
 	}

 	function pageDeconnexion(){


 		require('view/frontend/affichageDeconnexion.php');
 	}

 	function pageAjoutChapitre(){


 		require('view/backend/affichageAjoutChapitre.php');
 	}

 	function error($e){

   		require('view/frontend/affichageMessageErreur.php');
	}



 	




