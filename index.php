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
		if (isset($_GET["action"])) 
		{
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
 			}
 			  elseif ($_GET['action'] == 'traitementInscription'){
 				if (isset($_POST['forminscription'])){
 				    $pseudo = htmlspecialchars($_POST['pseudo']);
   					$mail = htmlspecialchars($_POST['mail']);
   					$mdp = sha1($_POST['mdp']);
   					$mdp2 = sha1($_POST['mdp2']);

				    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
				       $pseudolength = strlen($pseudo);
				      
				        if($pseudolength <= 30) {
				                    
				            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {				           
				                  
				                  if($mdp == $mdp2) {
				                  	 traitementInscription($pseudo, $mail, $mdp);
				                     throw new Exception("Votre compte a bien été créé ! <a href=\"index.php?action=pageConnexion\">Me connecter</a>");
				                  
				                  } else {
				                     throw new Exception("Vos mots de passes ne correspondent pas !");
				                  }

				            } else {
				               throw new Exception("Votre adresse mail n'est pas valide !");
				            }

				        } else {
				           throw new Exception("Votre pseudo ne doit pas dépasser 30 caractères !");
				        }

				    } else {
				      throw new Exception("Tous les champs doivent être complétés !");
				    }
				} 				

 			} elseif ($_GET['action'] == 'pageConnexion'){
				if(isset($_POST['formconnexion'])) {
   					$mailconnect = htmlspecialchars($_POST['mailconnect']);
   					$mdpconnect = sha1($_POST['mdpconnect']);
   
   					if(!empty($mailconnect) AND !empty($mdpconnect)){

      					if($userexist == 1) {
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

 			} elseif ($_GET['action'] == 'pageDeconnexion'){
 				pageDeconnexion();

 			} elseif ($_GET['action'] == 'pageAjoutChapitre'){
 				pageAjoutChapitre();
 			}
		} 
		else{
 			pageAccueil();
		}
	} 
	// Fin des tests
   	

  	//Début des Erreur		
	catch(Exception $e)
	{
	    error($e);
	}

 	




