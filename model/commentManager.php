<?php 
require_once('model/manager.php');

    //GESTION DES COMMENTAIRES
class CommentManager extends Manager{

	public function getComments($postId){
		
		// Connexion à la base de données
		$bdd = $this->bddConnect();

		// Récupération des commentaires
        $comments = $bdd->prepare('SELECT id_utilisateur, contenu, id_chapitre, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire WHERE id_chapitre = ? ORDER BY id DESC');
        $comments->execute(array($postId));
        

        return $comments;
	}

    public function postComment($postId){

    	//Connexion à la base de données
        $bdd = $this->bddConnect();
        
        // Insertion des commentaires
        $comments = $bdd->prepare('SELECT visiteurs.pseudo, commentaire.contenu, commentaire.id_chapitre FROM commentaire INNER JOIN visiteurs ON visiteurs.id = commentaire.id_utilisateur ');
        $affectedLines = $comments->execute(array($postId));

        return $affectedLines;
    }
}