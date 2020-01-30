<?php

	//chargement des différents classes
	require_once('model/AdminManager.php');
	require_once('model/CommentManager.php');
	require_once('model/PostManager.php');

	
	function newPost($titre, $contenu) {
		$postManager = new PostManager();

		$newPost = $postManager->createPost($titre, $contenu);

		Header('Location: index.php?action=addChapitre');
}

