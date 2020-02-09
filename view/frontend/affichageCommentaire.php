<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    <h2>Bonne lecture !</h2>

        <div class="container">
            <h3 align="center">
                <?= htmlspecialchars($post['titre']); ?>
            </h3><br>
                
            <p>
                <?= nl2br($post['contenu']); ?>
            </p>
                <em >publié le <?= $post['date_creation_fr']; ?></em>
        </div><br><br>
            
        <div>
            <div>
               <p class="phraseRetourChapitre"><a href="index.php?action=listeChapitres">Retour à la liste des chapitres</a></p>
            </div>        
            <hr>
                <h4 align="center">Espace commentaire</h4>
            <hr>
            
            <?php 
                if (!empty($_SESSION)){
            ?>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <label class="commentaire" for="commentaire">Commentaire :</label></br>
                <textarea name="commentaire" placeholder="Ajouter votre commentaire"></textarea><br>
                    <input id="buttonCommentaire" type="submit" value="Poster mon commentaire" name="submit_commentaire">
            </form>

            <?php 
            } else{
                    echo '<div id="laisserCommentaire"> Pour écrire un commentaire, veuillez vous <a href="index.php?action=pageConnexion"><b>Connecter</b></a></div>';
            }
            ?>

        </div><br><br>

            <!-- Affichage des commentaires -->
            <?php 
            while($c = $comments->fetch())
            { ?>

            <article class="ajoutCommentaire container">    
                <p><b><?= htmlspecialchars($c['pseudo']) ?></b><i> Ajouté le <?=$c['comment_date_fr'] ?></i></p><hr>
                <p><?= nl2br(htmlspecialchars($c['contenu'])) ?><br></p>
            
            <?php if (!empty($_SESSION)){ ?>
                <a class="signaler" href="index.php?action=reportComment" onclick="return(confirm('Etes vous sur de vouloir signaler ce commentaire ? '))"><i class="fas fa-exclamation-triangle"></i> Signaler</a></p>                
            <?php } ?>

            </article>    
            
            <?php 
            } ?> 

    <?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>