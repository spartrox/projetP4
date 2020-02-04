<?php

	//chargement des différents classes
	require_once('model/AdminManager.php');
	require_once('model/CommentManager.php');
	require_once('model/PostManager.php');

	//Affichage de la page Admin
	function pageAdmin(){

      	require('view/backend/affichageAdministrateur.php');
    }

	//Ajout d'un chapitre
	function newChapitre($titre, $contenu){
		$postManager = new PostManager();

		$newChapitre = $postManager->createPost($titre, $contenu);

		Header('Location: index.php?action=addChapitre');
	}

	//Surpression d'un chapitre	
	function deletePost($postId){
		$postManager = new PostManager();

		$deletePost = $postManager->deletePost($postId);

		Header('Location: index.php?action=pageAdmin');
	}

	//Surpression d'un commentaire
	function deleteComment($commentId) {
		$commentManager = new CommentManager();

		$deletedComment = $commentManager->deleteComment($commentId);

	Header('Location: index.php?action=pageAdmin');
	}

