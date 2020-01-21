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

 		$pseudo = htmlspecialchars($_POST['pseudo']);
 		$pseudolength = strlen($pseudo);
   		$mail = htmlspecialchars($_POST['mail']);
   		$mdp = sha1($_POST['mdp']);
   		$mdp2 = sha1($_POST['mdp2']);



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



 	




