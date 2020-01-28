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

 	function post(){

 		$postManager = new PostManager();
 		$commentManager = new CommentManager();

 		$post = $postManager->getChapitre($_GET['id']);
 		$comments = $commentManager->getComments($_GET['id']);

 		require('view/frontend/affichageCommentaire.php');
 	}

	function addComment($id_utilisateur, $contenu, $id_chapitre){

    	$commentManager = new CommentManager();

    	$affectedLines = $commentManager->postComment($pseudo, $commentaire, $chapitre);

    	if ($affectedLines === false) {
        	throw new Exception('Impossible d\'ajouter le commentaire !');
   		
   		} else {
        header('Location: index.php?action=post&id=' . $postId);
    }
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



 	




