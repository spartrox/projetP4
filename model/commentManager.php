<?php 
require_once('model/manager.php');

    //GESTION DES COMMENTAIRES
class CommentManager extends Manager{

    public function postComments($postId){

    	// Connexion à la base de données
        $bdd = $this->bddConnect();
        
        // Récupération des commentaires
        $comments = $bdd->prepare('SELECT visiteurs.pseudo, commentaire.id, commentaire.contenu, commentaire.id_chapitre, DATE_FORMAT(commentaire.comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaire INNER JOIN visiteurs ON visiteurs.id = commentaire.id_utilisateur  WHERE commentaire.id_chapitre = ? ORDER BY comment_date_fr ');
        $affectedLines = $comments->execute(array($postId));

        return $comments;
    }

    public function addComment($chapitre, $commentaire, $pseudo){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Ajout des commentaires
        $comments = $bdd->prepare('INSERT INTO commentaire(id, id_utilisateur, contenu, id_chapitre, comment_date) VALUES(?,?,?,?, NOW()) ');
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

        // Ajout d'un commentaire signalé
        $req = $bdd->prepare('INSERT INTO commentaire(signalement) VALUES (?) ');
        $reportComment = $req->execute(array($report));

        return $reportComment;
    }

    public function modifComment($commentId){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Modification d'un commentaire
        $req = $bdd->prepare('UPDATE commentaire SET contenu = ?, date_creation_fr = NOW() WHERE id = ? ');
        $modifComment = $req->execute(array($_POST['contenu'], $commentId));

        return $modifComment;

    } 
}