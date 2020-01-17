
    <?php

        if(isset($_SESSION['id'])){

            $pseudo = htmlspecialchars($_SESSION['id']);


        }

        if(isset($_GET['chapitre']) AND !empty($_GET['chapitre'])) {

            $chapitre = htmlspecialchars($_GET['chapitre']);
        }
        
        ?>


<?php $title = "Blog de Jean Forteroche"; ?>

    <?php ob_start(); ?>
    <h2>Bonne lecture !</h2>

        <div class="container">
            <h3 align="center">
                <?php echo htmlspecialchars($donnees['titre']); ?>
            </h3>
                
            <p>
                <?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>
             </p>
                <em >publié le <?php echo $donnees['date_creation_fr']; ?></em>
        </div><br><br>
            
        <div>        
            <hr>
                <h3 align="center">Espace commentaire</h3>
            <hr>
            <form method="POST" action="index.php?action=ajoutCommentaire&id=<?php echo($chapitre);?>">

                <textarea name="commentaire" placeholder="Ajouter votre commentaire"></textarea><br>
                    <input id="buttonCommentaire" type="submit" value="Poster mon commentaire" name="submit_commentaire">
                </form>

        </div><br><br>

            <!-- Affichage des commentaires -->
            <?php while($c = $comments->fetch()) { ?>

            <article class="ajoutCommentaire  container">    
                <p> <b><?= $c['id_utilisateur'] ?></b></p> <hr>

                <p> <?= $c['contenu'] ?> <br></p>
            </article>    
                <?php } ?> 

            <div>
               <p class="phraseRetourChapitre"><a href="index.php">Retour à la liste des chapitres</a></p>
            </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>