<?php
require_once("model/manager.php");

class PostManager extends Manager{
	

	public function getChapitres(){
	
		// Connexion à la base de données
		$bdd = $this->bddConnect();

		// Récupération des chapitres
		$req = $bdd->query('SELECT id, titre, SUBSTRING(contenu, 1,336) AS contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre ORDER BY date_creation DESC');

		return $req;
	}

	public function getChapitre($postId){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		// Récupération du chapitre
        $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM chapitre WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
	}
	public function createPost($titre, $contenu){
    	
    	// Connexion à la base de données
        $bdd = $this->bddConnect();

        // Création du nouveau chapitre
        $req = $bdd->prepare('INSERT INTO chapitre(titre, contenu, date_creation) VALUES (?, ?, NOW())');
        $newChapitre = $req->execute(array($titre, $contenu));

        return $newChapitre;
    }

}