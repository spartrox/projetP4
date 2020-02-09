<?php

   	//Chargement des différents classes
   	require_once('model/postManager.php');
  	require_once('model/commentManager.php');
    require_once('model/memberManager.php');

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

      function pageDeconnexion(){

      require('view/frontend/affichageDeconnexion.php');
    }

      function pageAjoutChapitre(){

      require('view/backend/affichageAjoutChapitre.php');
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
   		$comments = $commentManager->postComments($_GET['id']);
      $reportComment = $commentManager->reportComment($_GET['id']);

   		require('view/frontend/affichageCommentaire.php');
   	}

    //Ajout commentaire
  	function addComment($chapitre, $commentaire, $pseudo){

      	$commentManager = new CommentManager();
      	$addComment = $commentManager->addComment($chapitre, $commentaire, $pseudo);

      	if ($addComment === false) {
          	throw new Exception('Impossible d\'ajouter le commentaire !');
     		
     		} else {
          header('Location: index.php?action=post&id=' . $chapitre);
      }
    }

    //Ajout membres
   	function addMember($pseudo, $mdp, $mail){

   	  $memberManager = new MemberManager();
      
      $pseudoExist = $memberManager->checkPseudo($pseudo);
      $mailExist = $memberManager->checkMail($mail);  
        if ($pseudoExist){
            throw new Exception('Pseudo déja utilisé, veuillez en trouver un autre !');
        }

        if ($mailExist){
            throw new Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
        }

          if (!($pseudoExist) && !($mailExist)){

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

      if (!isset($member['id'])){
            throw new Exception("Mauvais identifiant !");
        }
          else {
              if ($mdpCorrect){
                $_SESSION['id'] = $member['id'];
                $_SESSION['pseudo'] = $member['pseudo'];
                $_SESSION['admin'] = $member['admin'];
                header('Location: index.php');
              }
                else {
                  throw new Exception("Mauvais mot de passe !");
                }
              }
    }

    //Affichage des erreurs
   	function error($e){

     		require('view/frontend/affichageMessageErreur.php');
  	}



 	




