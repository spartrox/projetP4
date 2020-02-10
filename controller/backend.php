<?php

	//chargement des différents classes
	require_once('model/adminManager.php');
	require_once('model/commentManager.php');
	require_once('model/postManager.php');

	//Affichage de la page Admin
	function pageAdmin(){
		$postManager = new PostManager();

		$posts =  $postManager-> getChapitres();

      	require('view/backend/affichageAdministrateur.php');
    }

	//Ajout d'un chapitre
	function newChapitre($titre, $contenu){
		$postManager = new PostManager();

		$newChapitre = $postManager->createPost($titre, $contenu);

		Header('Location: index.php?action=addChapitre');
	}

	//Supression d'un chapitre	
	function deletePost($postId){
		$postManager = new PostManager();

		$deletePost = $postManager->deletePost($postId);


		Header('Location: index.php?action=pageAdmin');
	}

	//Supression d'un commentaire
	function deleteComment($commentId){
		$commentManager = new CommentManager();

		$deletedComment = $commentManager->deleteComment($commentId);

		Header('Location: index.php?action=pageAdmin');
	}

	//Modification d'un chapitre
	function pageModifChapitre($postId){
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post =  $postManager-> getChapitre($postId);
		$comments = $commentManager->postComments($postId);

		require('view/backend/affichageModifChapitre.php');
	}

	//Chapitre modifié
	function chapitreModif($postId){
		$postManager = new PostManager();

		$chapitreModif = $postManager-> chapitreModif($postId);

		Header('Location: index.php?action=pageAdmin');
	}



	function pageModifComment(){
		$commentManager = new CommentManager();

		$modifComment = $commentManager->modifComment();

		require('view/backend/affichageModifComment.php');
	}


