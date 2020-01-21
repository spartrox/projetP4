 <?php
 	require('controller/controlleur.php');
	

	// Début  des tests	
	try
	{
		if (isset($_GET["action"])) 
		{
 			if ($_GET['action'] == 'listeChapitres'){
 			listeChapitres();

 			} elseif ($_GET['action'] == 'pageCommentaires'){

 				if(isset($_GET['id']) && $_GET['id'] > 0){
 				pageCommentaires();
 			}
 			
 			} elseif ($_GET['action'] == 'pageRenseignements'){
 				pageRenseignements();

 			} elseif ($_GET['action'] == 'pageInscription'){
 				if (isset($_POST['forminscription'])){
 				    $pseudo = htmlspecialchars($_POST['pseudo']);
   					$mail = htmlspecialchars($_POST['mail']);
   					$mdp = sha1($_POST['mdp']);
   					$mdp2 = sha1($_POST['mdp2']);

				    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
				       $pseudolength = strlen($pseudo);
				      
				        if($pseudolength <= 30) {
				                    
				            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				               
				               if($mailexist == 0) {
				                  
				                  if($mdp == $mdp2) {
				                     $erreur = "Votre compte a bien été créé ! <a href=\"index.php?action=pageConnexion\">Me connecter</a>";
				                  
				                  } else {
				                     $erreur = "Vos mots de passes ne correspondent pas !";
				                  }

				                } else {
				                  $erreur = "Adresse mail déjà utilisée !";
				                }

				            } else {
				               $erreur = "Votre adresse mail n'est pas valide !";
				            }

				        } else {
				           $erreur = "Votre pseudo ne doit pas dépasser 30 caractères !";
				        }

				    } else {
				      $erreur = "Tous les champs doivent être complétés !";
				    }
				} 				
					pageInscription();

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
         					$erreur = "Mauvais mail ou mot de passe !";
      					}
   					} else {
      					$erreur = "Tous les champs doivent être complétés !";
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
	    die('Erreur : '.$e->getMessage());
	}

 	




