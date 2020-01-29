<?php
require_once('model/manager.php');

	class connexionManager extends Manager{

    public function loginMember($pseudo){

    	// Connexion à la base de données
        $bdd = $this->bddConnect();

        //Récupération du pseudo
        $req = $bdd->prepare('SELECT id, pseudo, motdepasse FROM visiteurs WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }		

    public function checkPseudo($pseudo){

    	// Connexion à la base de données
		$bdd = $this->bddConnect();

		//Vérification si le pseudo existe
		$req = $bdd->prepare('SELECT pseudo FROM visiteurs WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$pseudoExist = $req->fetch();

		return $pseudoExist;
	}


	public function checkMail($mail){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		//Vérification si le mail existe
		$req = $bdd->prepare('SELECT mail FROM visiteurs WHERE mail = ?');
		$req->execute(array($mail));
		$mailExist = $req->fetch();

		return $mailExist;
	}

	public function createMember($pseudo, $mail, $mdp){

		// Connexion à la base de données
		$bdd = bddConnect();

		//Récupération des informations pour créer le membre
        $newMember = $bdd->prepare("INSERT INTO  visiteurs(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
        $newMember->execute(array($pseudo, $mail, $mdp));		

        return $newMember;
	}

	public function getMembers(){

		// Connexion à la base de données
		$bdd = bddConnect();

		//Récupération des informations du membre
		$members = $bdd->query('SELECT id, pseudo FROM visiteurs ORDER BY id');

		return $members;


	}
}