
<?php

if(isset($_POST['formconnexion'])) {

      $requser = $bdd->prepare("SELECT * FROM visiteurs WHERE pseudo = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpConnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
?>

<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	
			<div align="center">
				
				<h2>Connexion</h2>	
				<br><br>
				<form action="index.php?action=pageAccueil" method="post">	
							<div class="emailConnexion">
								<label>Pseudo :</label>
								<input type="text" name="pseudoconnect" placeholder="Pseudo"> <br>
							</div>
							<div id="mdpConnexion">
								<label>Mot de passe :</label>
								<input type="password" name="mdpConnect" placeholder="Mot de passe">
							</div>
							<div align="center">
								<br>
								<input type="submit" name="formconnexion" value="Se connecter" id="connexion">
							</div>
				</form> <br>

				<a href="index.php?action=pageInscription"> Cliquez ici pour créer un compte !</a>
			</div>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>