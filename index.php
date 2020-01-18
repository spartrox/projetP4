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
 				pageInscription();

 			} elseif ($_GET['action'] == 'pageConnexion'){
 				pageConnexion();

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

 	




