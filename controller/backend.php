<?php

	//chargement des différents classes
	require_once('model/commentManager.php');
	require_once('model/postManager.php');

	//Affichage de la page Admin
	function pageAdmin(){
		$postManager = new PostManager();

		$posts =  $postManager-> getChapitres();

		if ($posts === false){
			throw new Exception('Impossible d\'accéder à cette page');
		} else{
      			require('view/backend/affichageAdministrateur.php');
      	}
    }

    	///////// CHAPITRE //////////////

	//Ajout d'un chapitre
	function newChapitre($titre, $contenu){
		$postManager = new PostManager();


		$newChapitre = $postManager-> createPost($titre, $contenu);
		
		if ($newChapitre === false){
				throw new Exception('Impossible d\'ajouter un chapitre, veuillez recommencer');
		} else{
				Header('Location: index.php?action=addChapitre');
		}
	}

	//Supression d'un chapitre	
	function deletePost($postId){
		$postManager = new PostManager();

		$deletePost = $postManager-> deletePost($postId);

		if ($deletePost === false){
				throw new Exception('Impossible de supprimer ce chapitre, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageAdmin');
		}
	}

	//Page gestion chapitre
	function pageModifChapitre($postId){
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post =  $postManager-> getChapitre($postId);
		$comments = $commentManager->postComments($postId);

		if ($post  === false){
				throw new Exception('Impossible d\'accéder à la page de modification de chapitre, veuillez recommencer !');
		} else{
				require('view/backend/affichageModifChapitre.php');
		}
	}

	//Chapitre modifié
	function chapitreModif($postId){
		$postManager = new PostManager();

		$chapitreModif = $postManager-> chapitreModif($postId);

		if ($chapitreModif === false){
				throw new Exception('Impossible de modifier ce chapitre, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageAdmin');
		}
	}

    	///////// COMMENTAIRE //////////////


	//Supression d'un commentaire
	function deleteComment($commentId){
		$commentManager = new CommentManager();

		$deleteComment = $commentManager-> deleteComment($commentId);

		if ($deleteComment === false){
				throw new Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageAdmin');
		}
	}

	//page gestion des commentaires pour chaque chapitre
	function pageCommentChapitre($postId){
		$postManager = new PostManager();
		$commentManager = new CommentManager();
		
		$post =  $postManager-> getChapitre($postId);
		$comments = $commentManager->postComments($postId);

		if ($post  === false){
				throw new Exception('Impossible d\'accéder à la page des commentaires, veuillez recommencer !');
		} else{
				require('view/backend/affichageCommentaireChapitre.php');
		}

	}

	//Page gestion des commentaires signalé
	function pageCommentSignale($repComments){
		$commentManager = new CommentManager();

		$reportComments = $commentManager-> addReportComments($repComments);

		if ($reportComments === false){
				throw new Exception('Impossible d\'accéder à la page des commentaires signalé, veuillez recommencer !');
		} else{
				require('view/backend/affichageCommentaireSignale.php');
		}
}

	

