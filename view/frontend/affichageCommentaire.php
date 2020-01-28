<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    <h2>Bonne lecture !</h2>

        <div class="container">
            <h3 align="center">
                <?= htmlspecialchars($post['titre']); ?>
            </h3>
                
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
                <h3 align="center">Espace commentaire</h3>
            <hr>
            
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">

                <textarea name="commentaire" placeholder="Ajouter votre commentaire"></textarea><br>
                    <input id="buttonCommentaire" type="submit" value="Poster mon commentaire" name="submit_commentaire">
                </form>

        </div><br><br>

            <!-- Affichage des commentaires -->
            <?php 
            while($c = $comments->fetch())
            { ?>

            <article class="ajoutCommentaire container">    
                <p><b><?= htmlspecialchars($c['id_utilisateur']) ?></b> le <?=$c['comment_date_fr'] ?></p> <hr>
                <p><?= nl2br(htmlspecialchars($c['contenu'])) ?><br></p>
            </article>    
            
            <?php 
            } ?> 

    <?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>