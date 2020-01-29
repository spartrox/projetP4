 <?php

 	//Chargement des différents classes
 	require_once('model/PostManager.php');
	require_once('model/CommentManager.php');
  require_once('model/MemberManager.php');

 	//Création des différentes fonction
 	function pageAccueil(){

 		require('view/frontend/affichageAccueil.php');
 	}

  function pageInscription(){

    require('view/frontend/affichageInscription.php');
  }

  function pageRenseignements(){

    require('view/frontend/affichageRenseignements.php');
  }

  function pageConnexion(){

    require('view/frontend/affichageConnexion.php');
  }

  function pageProfil(){

    require('view/frontend/affichageProfil.php');
  }

  function pageAjoutChapitre(){

    require('view/backend/affichageAjoutChapitre.php');
  }

    function pageDeconnexion(){

    require('view/frontend/affichageDeconnexion.php');
  }

 	function listeChapitres(){

 		 	$postManager = new PostManager(); //Création d'un objet
 		 	$posts = $postManager->getChapitres();

			require('view/frontend/affichageChapitre.php');
 	}

  //Chapitre
 	function post(){

 		$postManager = new PostManager();
 		$commentManager = new CommentManager();

 		$post = $postManager->getChapitre($_GET['id']);
 		$comments = $commentManager->getComments($_GET['id']);

 		require('view/frontend/affichageCommentaire.php');
 	}

  //Ajout commentaire
	function addComment($id_utilisateur, $contenu, $id_chapitre){

    	$commentManager = new CommentManager();
    	$affectedLines = $commentManager->postComment($id_utilisateur, $contenu, $id_chapitre);

    	if ($affectedLines === false) {
        	throw new Exception('Impossible d\'ajouter le commentaire !');
   		
   		} else {
        header('Location: index.php?action=post&id=' . $postId);
    }
  }

  //Ajout membres
 	function addMember($pseudo, $mail, $mdp){

 	  $memberManager = new MemberManager();
    
    $pseudoExist = $memberManager->checkPseudo($pseudo);
    $mailExist = $memberManager->checkMail($mail);
      
      if ($pseudoExist){
          throw new Exception('Pseudo déja utilisé, veuillez en trouver un autre !');
      }

      if ($mailExist){
          throw new Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
      }

        if (!empty($pseudoExist) && !empty($mailExist)){

            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $newMember = $memberManager->createMember($pseudo, $mail, $mdp);
        }
            //Redirection vers la page d'accueil
            header('Location: index.php?action=pageAccueil');
 	}

  //Bouton page connexion
  function pageConnexionSubmit($pseudo, $mdp){

    $memberManager = new MemberManager();

    $member = $memberManager->loginMember($pseudo);
    $mdpCorrect = password_verify($_POST['mdpConnect'], $member['motdepasse']);

    if (!empty($member)){
          throw new Exception("Mauvais identifiant ou mot de passe !");
      }
        else {
            if ($mdpCorrect){
              $_SESSION['id'] = $member['id'];
              $_SESSION['pseudo'] = $pseudo['pseudo'];
              header('Location: index.php');
            }
              else {
                throw new Exception("Mauvais identifiant ou mot de passe !");
              }
            }
  }

  //Affichage des erreurs
 	function error($e){

   		require('view/frontend/affichageMessageErreur.php');
	}



 	




