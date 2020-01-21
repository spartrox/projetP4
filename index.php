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
					
					if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
				      
				      if($pseudolength <= 30) {
				                    
				            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
				               $reqmail = $bdd->prepare("SELECT * FROM visiteurs WHERE mail = ?");
				               $reqmail->execute(array($mail));
				               $mailexist = $reqmail->rowCount();
				               
				               if($mailexist == 0) {
				                  
				                  if($mdp == $mdp2) {
				                     $insertmbr = $bdd->prepare("INSERT INTO visiteurs(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
				                     $insertmbr->execute(array($pseudo, $mail, $mdp));
				                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
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
 				pageConnexion();

 			} elseif ($_GET['action'] == 'pageDeconnexion'){
 				pageDeconnexion();
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

 	




