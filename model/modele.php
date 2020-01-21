 <?php
 	function getChapitres(){

		// Connexion à la base de données
		$bdd = bddConnect();

		// Récupération des chapitres
		$req = $bdd->query('SELECT id, titre, SUBSTRING(contenu, 1,336) AS contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre ORDER BY date_creation DESC LIMIT 0, 6');

		return $req;
	}

	function getChapitre($chapitreId){

		// Connexion à la base de données
		$bdd = bddConnect();

		// Récupération du chapitre
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre WHERE id = ?');
        $req->execute(array($chapitreId));
        $donnees = $req->fetch();

        return $donnees;
	}

	function getCommentaires($chapitreId){
		
		// Connexion à la base de données
		$bdd = bddConnect();

		// Récupération des commentaires
        $comments = $bdd->prepare('SELECT * FROM commentaire WHERE id_chapitre = ? ORDER BY id DESC');
        $comments->execute(array($chapitreId));
        

        return $comments;
	}

	function getMail(){

		// Connexion à la base de données
		$bdd = bddConnect();

		// Test adresse mail
	    $reqmail = $bdd->prepare("SELECT * FROM visiteurs WHERE mail = ?");
        $reqmail->execute(array($mail));
        $mailexist = $reqmail->rowCount();

        return $mailexist;
	}

	function getInscription(){

		// Connexion à la base de données
		$bdd = bddConnect();

		//Récupération du pseudo du mail et du mdp
        $insertmbr = $bdd->prepare("SELECT pseudo, mail, motdepasse) FROM visiteurs VALUES(?, ?, ?)");
        $insertmbr->execute(array($pseudo, $mail, $mdp));		

        return $insertmbr;
	}

	function getConnexion(){




	}





	function bddConnect(){

		// Connexion à la base de données
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet_p4;charset=utf8', 'root', '');
			return $bdd;
		}
		catch(Exception $e)
		{
	        die('Erreur : '.$e->getMessage());
		}
	}

?>