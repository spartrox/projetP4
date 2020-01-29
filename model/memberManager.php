<?php
require_once('model/manager.php');

	class MemberManager extends Manager{

    //Récupération du pseudo
    public function loginMember($pseudo){

    	// Connexion à la base de données
        $bdd = $this->bddConnect();

        $req = $bdd->prepare('SELECT id, pseudo, motdepasse FROM visiteurs WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }		

    //Vérification si le pseudo existe
    public function checkPseudo($pseudo){

    	// Connexion à la base de données
		$bdd = $this->bddConnect();

		$req = $bdd->prepare('SELECT pseudo FROM visiteurs WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$pseudoExist = $req->fetch();

		return $pseudoExist;
	}

	//Vérification si le mail existe
	public function checkMail($mail){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		$req = $bdd->prepare('SELECT mail FROM visiteurs WHERE mail = ?');
		$req->execute(array($mail));
		$mailExist = $req->fetch();

		return $mailExist;
	}
	
	// Créer le membre
	public function createMember($pseudo, $mail, $mdp){

		// Connexion à la base de données
		$bdd = bddConnect();

        $newMember = $bdd->prepare("INSERT INTO  visiteurs(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
        $newMember->execute(array($pseudo, $mail, $mdp));		

        return $newMember;
	}

	//Récupération des informations du membre
	public function getMembers(){

		// Connexion à la base de données
		$bdd = bddConnect();

		$members = $bdd->query('SELECT id, pseudo FROM visiteurs ORDER BY id');

		return $members;
	}
}