 <?php
 session_start();

 	//Récupértion des fichiers nécessaire
 	require_once('controller/frontend.php');
 	require_once('controller/backend.php');

	// Début  des tests	
	try
	{
			if (isset($_GET["action"])){
	 			if ($_GET['action'] == 'listeChapitres'){
	 				listeChapitres();

	 			} elseif ($_GET['action'] == 'pageAccueil'){
	 				pageAccueil();
	 		
	 		    } elseif ($_GET['action'] == 'pageRenseignements'){
	 				pageRenseignements();

	 			} elseif ($_GET['action'] == 'pageInscription'){
	 				pageInscription();

	 			} elseif ($_GET['action'] == 'pageDeconnexion'){
	 				pageDeconnexion();

	 			} elseif ($_GET['action'] == 'pageAjoutChapitre'){
	 				pageAjoutChapitre();
	 			
	 			} elseif ($_GET['action'] == 'pageProfil'){
	 				pageProfil();
	 			
	 			} elseif ($_GET['action'] == 'pageConnexion'){				
	 				pageConnexion();

	 			} elseif ($_GET['action'] == 'pageMentionLegales'){
	 				pageMentionLegales();

	 			} elseif ($_GET['action'] == 'post'){

	 				if(isset($_GET['id']) && $_GET['id'] > 0){
	 					post();
	 				
	 				} else {
	                		throw new Exception('Aucun identifiant de billet envoyé');
	            	} 

	 			} elseif ($_GET['action'] == 'addComment'){
	 					if (isset($_GET['id']) && $_GET['id'] > 0){
	 						if (!empty($_SESSION['pseudo']) && !empty($_POST['commentaire'])){
	 							addComment($_GET['id'], $_POST['commentaire'], $_SESSION['id']);

	 						} else{
	 							   throw new Exception(" Veuillez entrer un commentaire !");
	 						}

	 					} else{
	 						   throw new Exception("Aucun identifiant de billet envoyé");		
	 					}

	 		    } elseif ($_GET['action'] == 'addMember'){
						if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])){
							//die(var_dump($_POST['pseudo'], $_POST['mdp'], $_POST['mdp2'], $_POST['mail']));
							if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
								if ($_POST['mdp'] == $_POST['mdp2']){
									addMember($_POST['pseudo'], $_POST['mdp'], $_POST['mail']);
								}
								else {
									  throw new Exception('Les deux mots de passe ne correspondent pas.');
								}
							} else {
									throw new Exception('Pas d\'adresse mail valide.');
								}
						} else {
								throw new Exception('Tous les champs ne sont pas remplis !');
						} 					

	 			} elseif ($_GET['action'] == 'pageConnexionSubmit'){
					pageConnexionSubmit($_POST['pseudoconnect'], $_POST['mdpConnect']);
				
				} elseif ($_GET['action'] == 'addChapitre'){
						if (!empty($_POST['titreChapitre']) && !empty($_POST['contenu'])){
							newChapitre($_POST['titreChapitre'], $_POST['contenu']);
							Header('Location: index.php?action=pageAdmin');
						} 
						else {
							  throw new Exception('Titre ou contenu vide !');
						}
				
				} elseif ($_GET['action'] == 'pageAdmin'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageAdmin();
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageModifChapitre'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageModifChapitre($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'chapitreModif'){
					if (isset($_GET['id']) && $_GET['id'] > 0){
						chapitreModif($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageCommentChapitre'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageCommentChapitre($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'deletePost'){
					deletePost($_GET['id']);

					
				} elseif ($_GET['action'] == 'deleteComment'){
					deleteComment($_GET['id']);
				
				} elseif ($_GET['action'] == 'reportComment'){
					reportComment($_GET['id'], $_GET['report']);
				
				} elseif ($_GET['action'] == 'pageModifComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageCommentSignale($_GET['id']);
					} else {
						pageAccueil();
					}
				}

			} else{
	 			pageAccueil();
			}
	} 
	// Fin des tests
   	
  	//Début des Erreur		
	catch(Exception $e)
	{
	    error($e);
	}

 	




