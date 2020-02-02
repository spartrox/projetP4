<?php

	//chargement des différents classes
	require_once('model/AdminManager.php');
	require_once('model/CommentManager.php');
	require_once('model/PostManager.php');

	function pageAdmin(){

      	require('view/backend/affichageAdministrateur.php');
    }

	function newChapitre($titre, $contenu){
		$postManager = new PostManager();

		$newChapitre = $postManager->createPost($titre, $contenu);

		Header('Location: index.php?action=addChapitre');
	}
	
	function  deleteChapitre($postId){
		$postManager = new PostManager();

		$deleteChapitre = $postManager->deleteChapitre($postId);

		Header('Location: index.php?action=pageAdmin&new-post=success');
	}

	function deleteCommentaire($commentaire) {
		$commentManager = new CommentManager();

		$deletedCommentaire = $commentManager->deleteCommentaire($commentaire);

	Header('Location: index.php?action=pageAdmin');
	}

