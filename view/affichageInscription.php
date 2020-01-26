<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    
      <div class="formulaire">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="index.php?action=traitementInscription">
                  <div>
                     <label class="nom" for="pseudo">Pseudo :</label>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </div>
                  <div class="email">
                     <label class="nom" for="mail">Email :</label>
                     <input type="email" placeholder="Votre email" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
                  </div>
                  <div class="mdp">
                     <label class="nom" for="mdp">Mot de passe :</label>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </div>
                  <div class="mdp2">
                     <label class="nom" for="mdp2">Confirmation du mot de passe :</label>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </div>
                  <div align="center">
                     <br/>
                     <input type="submit" name="forminscription" value="Je m'inscris" id="inscription" />
                  </div>
         </form> <br>
         <?php
            //if(isset($erreur)) {
            //  echo '<font color="red">'.$erreur."</font>";
            //}
            ?>

          <p>Déja un compte ? <a href="index.php?action=pageConnexion">Connectez-vous!</a> </p>
      </div>
         
    <?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>