
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=projet_p4', 'root', '');

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM visiteurs WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: index.php?action=pageAccueil?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	
			<div align="center">
				
				<h2>Connexion</h2>	
				<br><br>
				<form  method="POST" action="">	
							<div class="emailConnexion">
								<label>Email :</label>
								<input type="email" name="mailconnect" placeholder="Email"> <br>
							</div>
							<div id="mdpConnexion">
								<label>Mot de passe :</label>
								<input type="password" name="mdpconnect" placeholder="Mot de passe">
							</div>
							<div align="center">
								<br>
								<input type="submit" name="formconnexion" value="Se connecter" id="connexion">
							</div>
				</form> <br>
				
				<?php
				if (isset($erreur))
				{
					echo " <font color='red'>" . $erreur . "</font>";
				}
				?>
				<a href="index.php?action=pageInscription"> Cliquez ici pour créer un compte !</a>
			</div>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>