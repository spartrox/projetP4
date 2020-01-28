 <?php
 session_start();

 	//Récupértion des fichiers nécessaire
 	require_once('controller/frontend.php');
 	require_once('controller/backend.php');

	// Début  des tests	
	try
	{
		if (isset($_POST['login'])){
			login();
		}
			if (isset($_GET["action"])){
	 			if ($_GET['action'] == 'listeChapitres'){
	 				listeChapitres();

	 			} elseif ($_GET['action'] == 'post'){

	 				if(isset($_GET['id']) && $_GET['id'] > 0){
	 				post();
	 				
	 				} else {
	                		throw new Exception('Aucun identifiant de billet envoyé');
	            	} 
	 			
	 			} elseif ($_GET['action'] == 'addComment'){
	 					if (isset($_GET['id']) && $_GET['id'] > 0){
	 						if (!empty($_POST['commentaire'])){
	 							addComment($_GET['id'], $_POST['pseudo'], $_POST['commentaire']);

	 						} else{
	 							   throw new Exception(" Veuillez entrer un commentaire !");
	 						}

	 					} else{
	 						   throw new Exception("Aucun identifiant de billet envoyé");		
	 					}

	 			} elseif ($_GET['action'] == 'pageRenseignements'){
	 				pageRenseignements();

	 			} elseif ($_GET['action'] == 'pageInscription'){
	 				pageInscription();

	 			} elseif ($_GET['action'] == 'pageDeconnexion'){
	 				pageDeconnexion();

	 			} elseif ($_GET['action'] == 'pageAjoutChapitre'){
	 				pageAjoutChapitre();
	 			
	 			} elseif ($_GET['action'] == 'addMember'){
						if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])){
							if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
								if ($_POST['mdp'] == $_POST['mdp2']){
									addMember(strip_tags($_POST['pseudo']), strip_tags($_POST['mdp']), strip_tags($_POST['mail']));
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

	 			} elseif ($_GET['action'] == 'pageConnexion'){
						if(isset($_POST['pseudo'])){
			   					if(!empty($pseudoConnect) AND !empty($mdpConnect)){
			      					if($userexist == 1){
			         					$userinfo = $requser->fetch();
							            $_SESSION['id'] = $userinfo['id'];
							            $_SESSION['pseudo'] = $userinfo['pseudo'];
							            $_SESSION['mail'] = $userinfo['mail'];
			         					header("Location: index.php?action=pageAccueil?id=".$_SESSION['id']);

			      					} else {
			         						throw new Exception("Mauvais mail ou mot de passe !");
			      					}

			   					} else {
	      								throw new Exception("Tous les champs doivent être complétés !");
	   							}
						}
	 				pageConnexion();
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

 	




