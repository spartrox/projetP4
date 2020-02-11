<?php 
require_once('model/manager.php');

    //GESTION DES COMMENTAIRES
class CommentManager extends Manager{

    public function postComments($postId){

    	//Connexion à la base de données
        $bdd = $this->bddConnect();
        
        // Insertion des commentaires
        $comments = $bdd->prepare('SELECT visiteurs.pseudo, commentaire.id, commentaire.contenu, commentaire.id_chapitre, DATE_FORMAT(commentaire.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire INNER JOIN visiteurs ON visiteurs.id = commentaire.id_utilisateur  WHERE commentaire.id_chapitre = ? ORDER BY comment_date_fr ');
        $affectedLines = $comments->execute(array($postId));

        return $comments;
    }

    public function addComment($chapitre, $commentaire, $pseudo){

        //Connexion à la base de données
        $bdd = $this->bddConnect();

        $comments = $bdd->prepare('INSERT INTO commentaire(id, id_utilisateur, contenu, id_chapitre, comment_date) VALUES(?,?,?,?, NOW())');
        $addComment = $comments->execute(array($id, $pseudo, $commentaire, $chapitre));

        return $addComment;
    }

    public function deleteComment($commentId){
        
        // Connexion à la base de données
        $bdd = $this->bddConnect();  
        
        // Suppression d'un commentaire
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id = ?');
        $deleteComment = $req->execute(array($commentId));

        return $deleteComment;
    }

    public function reportComment($report){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // insertion des commentaires signalé
        $reportComment = $bdd->prepare('SELECT signalement FROM commentaire WHERE id = ?');
    }

    /*public function modifComment(){

        // Connexion à la base de données
        $bdd = $this->bddConnect();


        //insertion des commentaires signalé
        $reportComment = $bdd->query('SELECT signalement FROM commentaire WHERE id = ?');

        return $reportComment;

    } */
}