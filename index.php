 <?php
 	require('controller/controlleur.php');
		
		try
		{
			if (isset($_GET["action"])) {
 			if ($_GET['action'] == 'listeChapitres') {

 			listeChapitres();
 		} 
 		elseif ($_GET['action'] == 'chapitreEtCommentaires') {
 			if(isset($_GET['id']) && $_GET['id'] > 0){

 			chapitreEtCommentaires();
 		}
 		else{
 			echo "Erreur : ...";
 		}
 	}	
}
else{
 	pageAccueil();
}
	}
		catch(Exception $e)
		{
	        die('Erreur : '.$e->getMessage());
		}

 	




